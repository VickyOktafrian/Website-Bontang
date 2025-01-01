<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    /**
     * Mengarahkan pengguna ke halaman login OAuth Google
     */
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Mengambil data pengguna dari Google setelah login
     */
    public function googleredirect()
    {
        try {
            // Mengambil data pengguna dari Google
            $googleUser = Socialite::driver('google')->user();

            // Cek apakah pengguna sudah terdaftar berdasarkan ID Google
            $user = User::where('google_id', $googleUser->getId())->first();

            // Jika pengguna belum terdaftar, buat akun baru
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'username' => $googleUser->getName(),  // Menggunakan nama Google untuk username
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'foto_profil' => $googleUser->getAvatar(),
                    'role' => 'user',
                    'password' => '',  // Tidak perlu password karena login menggunakan Google
                ]);
            }

            // Login pengguna
            Auth::login($user);

            // Mengarahkan pengguna ke beranda atau dashboard
            return redirect()->route('beranda')->with('user_name', $googleUser->getName());  // Menambahkan 'user_name' ke session

        } catch (Exception $e) {
            // Log pesan error jika login gagal untuk debugging
            \Log::error('Google login failed: ' . $e->getMessage());

            // Mengarahkan kembali ke halaman login dengan pesan error
            return redirect()->route('login.tampil')->with('error', 'Login dengan Google gagal!');
        }
    }

    /**
     * Logout pengguna dari aplikasi dan Google
     */
    public function logout(Request $request)
    {
        // Logout dari aplikasi Laravel
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Logout dari Google (jika perlu ditangani, bisa diarahkan ke URL logout Google)
        return redirect()->away('https://accounts.google.com/Logout?continue=https://www.google.com');
    }
}
