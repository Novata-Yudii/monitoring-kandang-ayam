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
        $email = $request->email;
        $password = $request->password;
        Session::flash('email',$email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email wajib di isi!',
            'password.required' => 'Password wajib di isi!'
        ]);
        $infoLogin = [
            'email' => $email,
            'password' => $password
        ];
        if (Auth::attempt($infoLogin)) {
            return redirect('/')->with('succes', 'Berhasil login');
        }else {
            return redirect('/login')->withErrors('Username atau Password tidak valid');
        }
    }
}
