<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Menampilkan halaman checkout.
     */
    public function checkout()
{
    $cart = session('cart', []);
    $totalHarga = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $cart));

    // Initialize snapToken with null
    $snapToken = null;

    // If user is logged in, generate snapToken for Midtrans
    if (Auth::check()) {
        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => uniqid('order_'), // Generate unique order ID
                'gross_amount' => $totalHarga,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );

        // Get snapToken from Midtrans
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Store snapToken in session
        session()->put('snapToken', $snapToken);
    }
    

    return view('order.checkout', compact('cart', 'totalHarga', 'snapToken'));
}

    /**
     * Proses menyimpan pesanan.
     */
    public function store(Request $request)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang belanja kosong.');
        }

        // Simpan data pesanan
        $order = Order::create([
            'user_id' => Auth::id(),
            'tanggal_order' => now(),
            'total_harga' => $request->total_harga,
            'status' => 'Pending',
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        // Simpan data item pesanan
        foreach ($cart as $id => $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'barang_id' => $id,
                'jumlah' => $item['quantity'],
                'harga_per_item' => $item['price'],
            ]);
        }

        \Midtrans\Config::$serverKey = config('services.midtrans.server_key');
        \Midtrans\Config::$isProduction = config('services.midtrans.is_production');
        \Midtrans\Config::$isSanitized = config('services.midtrans.is_sanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is_3ds');

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_harga,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ),
        );
        
        // Dapatkan snapToken
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        // Kosongkan keranjang
        session()->forget('cart');
        
        // Simpan snapToken di session untuk digunakan di checkout
        session()->put('snapToken', $snapToken);

        return redirect()->route('order.success', $order->id)
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Halaman sukses setelah checkout.
     */
    public function success($id)
{
    $order = Order::with('orderItems')->findOrFail($id);

    return view('order.success', compact('order'));
}
public function listorderan()
{
    $orders = Order::with('orderItems.barang')
        ->where('user_id', Auth::id())
        ->get();

    return view('order.orderan', compact('orders'));
}
public function updateStatus(Request $request, $id)
{
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save(); // Pastikan disimpan ke database

    return redirect()->back()->with('success', 'Status berhasil diperbarui.');
}


}
