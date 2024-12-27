<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class FacebookController extends Controller
{
    public function facebookpage()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookredirect()
    {
        try {
            // Ambil data pengguna dari Facebook
            $user = Socialite::driver('facebook')->user();
    
            // Cek apakah pengguna sudah ada berdasarkan `facebook_id`
            $finduser = User::where('facebook_id', $user->id)->first();
    
            if ($finduser) {
                // Jika pengguna sudah ada, login pengguna
                Auth::login($finduser);
            } else {
                // Jika pengguna belum ada, buat pengguna baru
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id' => $user->id,
                    'password' => bcrypt('123456dummy')  // Password default, sesuaikan jika perlu
                ]);
    
                // Login pengguna yang baru dibuat
                Auth::login($newUser);
            }
    
            // Simpan token akses Facebook ke sesi
            session(['facebook_access_token' => $user->token]);
    
            // Arahkan ke halaman utama setelah login
            return redirect()->intended('beranda');
        } catch (Exception $e) {
            return redirect()->route('beranda')->with('error', 'Unable to login with Facebook');
        }
    }
    
public function logout(Request $request)
{
    // Periksa jika pengguna login dengan Facebook
    if (session()->has('facebook_access_token')) {
        $accessToken = session()->get('facebook_access_token');

        // Endpoint logout Facebook
        $facebookLogoutUrl = "https://www.facebook.com/logout.php?next=" . route('beranda') . "&access_token=" . $accessToken;

        // Hapus token dari sesi
        session()->forget('facebook_access_token');

        // Logout dari Facebook dengan redirect
        return redirect()->away($facebookLogoutUrl);
    }

    // Logout dari aplikasi lokal
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('beranda');
}

}
