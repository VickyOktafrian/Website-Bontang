<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;

class GoogleController extends Controller
{
    // Redirect to Google's OAuth page
    public function googlepage()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the redirect after Google OAuth login
    public function googleredirect()
    {
        try {
            // Get the Google user data
            $googleUser = Socialite::driver('google')->user();

            // Check if the user already exists in the database by Google ID
            $user = User::where('google_id', $googleUser->getId())->first();

            // If user does not exist, create a new account
            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'username' => $googleUser->getName(),  // You can use Google ID or any other field for username
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'foto_profil' => $googleUser->getAvatar(),
                    'role' => 'user',
                    'password' => '',  // No password needed as it's using Google login
                ]);
            }

            // Log the user in
            Auth::login($user);

            // Redirect to the homepage or dashboard
            return redirect()->route('beranda')->with('user_name', $googleUser->getName());  // Passing user name to session

        } catch (Exception $e) {
            // Log the error for debugging
            \Log::error('Google login failed: ' . $e->getMessage());
            return redirect()->route('login.tampil')->with('error', 'Login dengan Google gagal!');
        }
    }

    // Logout the user
    public function logout(Request $request)
    {
        // Logout from Laravel
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Logout from Google (you can handle Google logout here if needed)
        return redirect()->away('https://accounts.google.com/Logout?continue=https://www.google.com');
    }
}
