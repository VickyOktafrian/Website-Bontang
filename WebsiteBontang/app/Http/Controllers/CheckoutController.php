<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    // Menampilkan halaman checkout
    public function index()
    {
        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Jika keranjang kosong, redirect ke halaman produk
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Tampilkan halaman checkout dengan data keranjang
        return view('checkout.index', compact('cart'));
    }

    // Memproses checkout
    public function process(Request $request)
    {
        // Validasi data yang dikirim dari form checkout
        $request->validate([
            'alamat' => 'required|string|max:255',
            'metode_pembayaran' => 'required|in:credit_card,bank_transfer,cash_on_delivery',
        ]);

        // Ambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Jika keranjang kosong, redirect ke halaman produk
        if (empty($cart)) {
            return redirect()->route('products.index')->with('error', 'Keranjang Anda kosong.');
        }

        // Membuat pesanan baru
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_harga' => array_sum(array_column($cart, 'price')), // Total harga pesanan
            'status' => 'pending', // Status pesanan
            'alamat_pengiriman' => $request->alamat,
        ]);

        // Menambahkan item pesanan ke order_items
        foreach ($cart as $productId => $item) {
            $order->orderItems()->create([
                'barang_id' => $productId,
                'jumlah' => $item['quantity'],
                'harga_per_item' => $item['price'],
            ]);
        }

        // Menyimpan metode pembayaran
        // Untuk demo, kita asumsikan pembayaran dilakukan setelah checkout
        $order->payment()->create([
            'metode_pembayaran' => $request->metode_pembayaran,
            'jumlah_bayar' => $order->total_harga,
            'status_pembayaran' => 'pending', // Status pembayaran sementara
        ]);

        // Mengosongkan keranjang setelah checkout
        session()->forget('cart');

        // Redirect ke halaman konfirmasi atau detail pesanan
        return redirect()->route('order.show', $order->id)->with('success', 'Pesanan Anda berhasil dibuat!');
    }
}
