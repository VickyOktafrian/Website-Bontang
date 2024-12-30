<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Barang $barang)
{
    $cart = session()->get('cart', []);
    
    // Mengambil jumlah produk dari request
    $quantity = $request->input('quantity', 1);
    
    // Validasi jumlah produk
    if ($quantity < 1 || $quantity > $barang->stok) {
        return redirect()->back()->with('error', 'Jumlah produk tidak valid!');
    }

    // Jika produk sudah ada di keranjang, tambahkan jumlahnya
    if (isset($cart[$barang->id])) {
        $cart[$barang->id]['quantity'] += $quantity;
    } else {
        // Jika produk belum ada, tambahkan produk baru
        $cart[$barang->id] = [
            'name' => $barang->nama,
            'price' => $barang->harga,
            'quantity' => $quantity,
            'image' => $barang->gambar,
        ];
    }

    // Simpan kembali ke session
    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
}

    
public function index()
{
    $cart = session()->get('cart', []);

    return view('cart.index', compact('cart'));
}
public function update(Request $request, Barang $barang)
{
    $cart = session()->get('cart', []);

    // Validate quantity
    $quantity = $request->input('quantity', 1);
    if ($quantity < 1 || $quantity > $barang->stok) {
        return redirect()->route('cart.index')->with('error', 'Jumlah produk tidak valid!');
    }

    if (isset($cart[$barang->id])) {
        $cart[$barang->id]['quantity'] = $quantity;
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
}

public function remove(Barang $barang)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$barang->id])) {
        unset($cart[$barang->id]);
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
}

public function clear()
{
    session()->forget('cart');

    return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan!');
}

}
