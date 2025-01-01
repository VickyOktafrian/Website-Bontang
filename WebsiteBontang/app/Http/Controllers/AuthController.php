<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman pendaftaran
    public function showDaftar(){
        return view('user.register');
    }

    // Memproses data pendaftaran pengguna
    public function submitDaftar(Request $request){
        $pengguna = new User();
        $pengguna->name = $request->name;         // Menyimpan nama pengguna
        $pengguna->username = $request->username; // Menyimpan username
        $pengguna->email = $request->email;       // Menyimpan email
        $pengguna->password = bcrypt($request->password); // Menyimpan password yang sudah di-hash
        $pengguna->save(); // Menyimpan data pengguna ke database
        return redirect()->route('login.tampil'); // Arahkan ke halaman login setelah pendaftaran sukses
    }

    // Menampilkan halaman login
    public function showLogin(){
        return view('user.login');
    }

    // Memproses data login pengguna
    public function submitLogin(Request $request){
        $data = $request->only('username', 'password'); // Mengambil data username dan password
        
        // Memeriksa apakah checkbox 'remember' dicentang
        $remember = $request->has('remember');
    
        // Coba untuk melakukan login
        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate(); // Mengatur ulang sesi agar lebih aman
            return redirect()->route('beranda'); // Arahkan ke halaman beranda jika login berhasil
        } else {
            return redirect()->back()->with('gagal', 'Username atau password salah.'); // Tampilkan pesan error jika login gagal
        }
    }

    // Melakukan logout
    public function logout(){
        Auth::logout(); // Mengeluarkan pengguna dari sesi
        return redirect()->route('beranda'); // Arahkan kembali ke halaman beranda setelah logout
    }

    // Redirect jika autentikasi membutuhkan aksi tertentu
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('beranda');  // Arahkan ke beranda setelah login
        }
    }
}
