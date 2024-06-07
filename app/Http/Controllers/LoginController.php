<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login(Request $request){
        Session::flash('email', $request->email);
        $credential = $request->validate([
            'email' => 'required|email:dns|max:255',
            'password' => 'required|min:5'
        ],[
            'email.required' => 'Email wajib di isi!',
            'email.email' => 'Email tidak valid!',
            'password.required' => 'Password wajib di isi!',
            'password.min' => 'Password minimal 5 karakter!'
        ]);
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard')->with('succes', 'Berhasil login');
        }else {
            return redirect('/login')->with('error_auth', 'Username atau Password tidak valid');
        }
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
