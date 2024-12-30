<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
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

        return view('order.checkout', compact('cart', 'totalHarga'));
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

        // Kosongkan keranjang
        session()->forget('cart');

        return redirect()->route('order.success', $order->id)->with('success', 'Pesanan berhasil dibuat.');
    }

    /**
     * Halaman sukses setelah checkout.
     */
    public function success($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        return view('order.success', compact('order'));
    }
    
}
