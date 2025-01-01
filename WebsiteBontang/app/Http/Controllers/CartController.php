<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Menambahkan produk ke dalam keranjang belanja.
     */
    public function add(Request $request, Barang $barang)
    {
        // Mengambil data keranjang dari session, atau membuat keranjang kosong jika tidak ada
        $cart = session()->get('cart', []);
        
        // Mengambil jumlah produk dari request (default 1 jika tidak ada)
        $quantity = $request->input('quantity', 1);
        
        // Validasi jumlah produk agar tidak kurang dari 1 dan tidak melebihi stok
        if ($quantity < 1 || $quantity > $barang->stok) {
            return redirect()->back()->with('error', 'Jumlah produk tidak valid!');
        }

        // Jika produk sudah ada di keranjang, tambahkan jumlahnya
        if (isset($cart[$barang->id])) {
            $cart[$barang->id]['quantity'] += $quantity;
        } else {
            // Jika produk belum ada, tambahkan produk baru ke keranjang
            $cart[$barang->id] = [
                'name' => $barang->nama,
                'price' => $barang->harga,
                'quantity' => $quantity,
                'image' => $barang->gambar,
            ];
        }

        // Simpan keranjang ke session
        session()->put('cart', $cart);

        // Kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    /**
     * Menampilkan halaman keranjang belanja.
     */
    public function index()
    {
        // Mengambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Menampilkan halaman keranjang dengan data keranjang
        return view('cart.index', compact('cart'));
    }

    /**
     * Memperbarui jumlah produk dalam keranjang.
     */
    public function update(Request $request, Barang $barang)
    {
        // Mengambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Validasi jumlah produk
        $quantity = $request->input('quantity', 1);
        if ($quantity < 1 || $quantity > $barang->stok) {
            return redirect()->route('cart.index')->with('error', 'Jumlah produk tidak valid!');
        }

        // Memperbarui jumlah produk dalam keranjang
        if (isset($cart[$barang->id])) {
            $cart[$barang->id]['quantity'] = $quantity;
        }

        // Simpan kembali keranjang ke session
        session()->put('cart', $cart);

        // Kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    /**
     * Menghapus produk dari keranjang.
     */
    public function remove(Barang $barang)
    {
        // Mengambil data keranjang dari session
        $cart = session()->get('cart', []);

        // Menghapus produk dari keranjang
        if (isset($cart[$barang->id])) {
            unset($cart[$barang->id]);
        }

        // Simpan kembali keranjang yang sudah diperbarui ke session
        session()->put('cart', $cart);

        // Kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }

    /**
     * Mengosongkan semua produk dalam keranjang.
     */
    public function clear()
    {
        // Menghapus semua data keranjang dari session
        session()->forget('cart');

        // Kembali ke halaman keranjang dengan pesan sukses
        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil dikosongkan!');
    }
}
