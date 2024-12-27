<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class FacebookController extends Controller
{
    // Mengarahkan pengguna ke halaman login Facebook
    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // Callback dari Facebook setelah pengguna login
    public function facebookredirect()
{
    try {
        // Mengambil data pengguna dari Facebook
        $facebookUser = Socialite::driver('facebook')->user();

        // Cek apakah pengguna sudah terdaftar berdasarkan ID Facebook
        $user = User::where('facebook_id', $facebookUser->getId())->first();

        // Jika pengguna belum ada, buat akun baru
        if (!$user) {
            $user = User::create([
                'name' => $facebookUser->getName(),
                'username' => $facebookUser->getId(),  // Atur username dengan ID Facebook atau nama
                'email' => $facebookUser->getEmail(),
                'facebook_id' => $facebookUser->getId(),
                'foto_profil' => $facebookUser->getAvatar(),
                'role' => 'user',
                'password' => 'password',  // Tidak perlu password karena login menggunakan Facebook
            ]);
        }
        

        // Login pengguna
        Auth::login($user);

        // Menyimpan nama pengguna dalam session untuk ditampilkan di halaman beranda
        return redirect()->route('beranda')->with('user_name', $facebookUser->getName());  // Menambahkan 'user_name' ke session

    } catch (Exception $e) {
        // Log the error message for debugging
        \Log::error('Facebook login failed: ' . $e->getMessage());
        return redirect()->route('login.tampil')->with('error', 'Login dengan Facebook gagal!');
    }
}

        public function logout(Request $request)
    {
        // Logout dari aplikasi Laravel
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Logout dari Facebook (redirect ke URL logout Facebook)
        return redirect()->away('https://www.facebook.com/logout.php?next=' . route('beranda'));
    }
}
