<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showDaftar(){
        return view('user.register');
    }
    public function submitDaftar(Request $request){
        $pengguna = new User();
        $pengguna->name = $request->name;
        $pengguna->username = $request->username;
        $pengguna->email = $request->email;
        $pengguna->password = bcrypt($request->password);
        $pengguna->save();
        // dd($pengguna);
        return redirect()->route('login.tampil');

    }
    public function showLogin(){
        return view('user.login');
    }
    public function submitLogin(Request $request){
        $data = $request->only('username', 'password');
        
        // Memeriksa apakah checkbox 'remember' dicentang
        $remember = $request->has('remember');
    
        // Coba untuk melakukan login
        if (Auth::attempt($data, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('beranda');
        } else {
            return redirect()->back()->with('gagal', 'Username atau password salah.');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('beranda');

    }
    

}
