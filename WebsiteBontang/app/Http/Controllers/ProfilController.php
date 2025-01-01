<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class ProfilController extends \Illuminate\Routing\Controller
{
    // Konstruktor untuk memastikan pengguna sudah login sebelum mengakses halaman
    public function __construct()
    {
        $this->middleware('auth'); // Middleware ini memastikan hanya pengguna yang terautentikasi yang dapat mengakses controller ini
    }

    // Fungsi untuk menampilkan data profil pengguna
    public function show()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login
        return view('user.profil', compact('user'))->with('title', 'Profil'); // Mengirimkan data pengguna ke view 'user.profil'
    }

    // Fungsi untuk mengupdate data profil pengguna
    public function update(Request $request)
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang login

        // Validasi data yang dimasukkan oleh pengguna
        $request->validate([
            'name' => 'required|string|max:255', // Nama wajib diisi dan maksimal 255 karakter
            'username' => 'required|string|max:255|unique:users,username,' . $user->id, // Username wajib unik
            'email' => 'required|email|max:255|unique:users,email,' . $user->id, // Email wajib unik
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Foto profil opsional dengan validasi format gambar
        ]);

        // Update data pengguna
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;

        // Cek apakah ada foto profil yang di-upload, jika ada simpan di folder 'profile_pictures'
        if ($request->hasFile('foto_profil')) {
            $imagePath = $request->file('foto_profil')->store('profile_pictures', 'public'); // Menyimpan gambar dan mendapatkan path-nya
            $user->foto_profil = $imagePath; // Menyimpan path gambar ke database
        }

        // Simpan data yang telah diperbarui
        $user->save();

        // Redirect kembali ke halaman edit profil dengan pesan sukses
        return redirect()->route('profil.edit')->with('success', 'Profile updated successfully!'); // Mengirimkan pesan sukses ke view
    }
}
