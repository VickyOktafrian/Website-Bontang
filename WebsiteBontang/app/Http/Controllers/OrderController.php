<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Menampilkan halaman checkout dengan detail keranjang belanja.
     */
    public function checkout()
    {
        // Mendapatkan data keranjang belanja dari session
        $cart = session('cart', []);

        // Menghitung total harga dari keranjang belanja
        $totalHarga = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity']; // Mengalikan harga dan jumlah tiap item
        }, $cart));

        // Menyimpan snapToken untuk Midtrans
        $snapToken = null;

        // Jika pengguna sudah login, buat snapToken untuk transaksi Midtrans
        if (Auth::check()) {
            \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
            \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
            \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
            \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

            // Mengonfigurasi parameter transaksi untuk Midtrans
            $params = array(
                'transaction_details' => array(
                    'order_id' => uniqid('order_'), // Membuat ID pesanan unik
                    'gross_amount' => $totalHarga, // Total harga dari keranjang belanja
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name, // Nama pengguna
                    'email' => Auth::user()->email, // Email pengguna
                ),
            );

            // Mendapatkan snapToken dari Midtrans
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            // Menyimpan snapToken di session
            session()->put('snapToken', $snapToken);
        }

        // Mengembalikan tampilan checkout dengan data keranjang belanja, total harga, dan snapToken
        return view('order.checkout', compact('cart', 'totalHarga', 'snapToken'));
    }

    /**
     * Menyimpan data pesanan setelah checkout.
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);

        // Jika keranjang belanja kosong, kembalikan ke halaman keranjang dengan pesan error
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong.');
        }

        // Simpan data pesanan ke dalam tabel 'orders'
        $order = Order::create([
            'user_id' => Auth::id(), // ID pengguna yang melakukan pesanan
            'tanggal_order' => now(), // Waktu pemesanan
            'total_harga' => $request->total_harga, // Total harga pesanan
            'status' => 'Pending', // Status pesanan (default adalah 'Pending')
            'alamat_pengiriman' => $request->alamat_pengiriman, // Alamat pengiriman
        ]);

        // Simpan data item pesanan ke dalam tabel 'order_items'
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id, // ID pesanan
                'barang_id' => $id, // ID barang yang dipesan
                'jumlah' => $item['quantity'], // Jumlah barang yang dipesan
                'harga_per_item' => $item['price'], // Harga per item
            ]);
        }

        // Konfigurasi Midtrans untuk transaksi pembayaran
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

        // Parameter transaksi untuk Midtrans
        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id, // ID pesanan
                'gross_amount' => $order->total_harga, // Total harga pesanan
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name, // Nama pengguna
                'email' => Auth::user()->email, // Email pengguna
            ),
        );

        // Mendapatkan snapToken untuk pembayaran
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Mengosongkan keranjang setelah pesanan dibuat
        session()->forget('cart');

        // Menyimpan snapToken di session
        session()->put('snapToken', $snapToken);

        // Mengarahkan ke halaman sukses pesanan dengan pesan sukses
        return redirect()->route('order.success', $order->id)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Menampilkan halaman sukses setelah checkout.
     */
    public function success($id)
    {
        $order = Order::with('orderItems')->findOrFail($id); // Mengambil data pesanan dan item terkait

        return view('order.success', compact('order')); // Menampilkan halaman sukses
    }

    /**
     * Menampilkan daftar pesanan pengguna.
     */
    public function listorderan()
    {
        // Mengambil semua pesanan milik pengguna yang sedang login
        $orders = Order::with('orderItems.barang')
            ->where('user_id', Auth::id()) // Mengambil pesanan berdasarkan user_id
            ->get();

        return view('order.orderan', compact('orders')); // Menampilkan daftar pesanan
    }

    /**
     * Mengupdate status pesanan.
     */
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id); // Mencari pesanan berdasarkan ID
        $order->status = $request->status; // Update status pesanan
        $order->save(); // Menyimpan perubahan status

        // Mengarahkan kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Status berhasil diperbarui.');
    }
}
