<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('pages.user', [
            'users' => $users,
            'title' => 'User'
        ]);
    }
    public function create(){
        return view('pages.usercreate', ['title' => 'User']);
    }
    public function store(Request $request){
        $credential = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email:dns|unique:users|max:255',
            'password' => 'required|min:5'
        ],[
            'name.required' => 'Nama wajib di isi!',
            'name.min' => 'Nama minimal 5 karakter!',
            'email.required' => 'Email wajib di isi!',
            'email.email' => 'Email tidak valid!',
            'email.unique' => 'Email sudah digunakan!',
            'email.max' => 'Email maximal 255 karakter!',
            'password.min' => 'Password minimal 5 karakter!',
            'password.required' => 'Password wajib di isi!'
        ]);
        $credential['password'] = Hash::make($credential['password']);
        User::create($credential);
        return redirect('/user')->with('succes','Berhasil menambahkan data');
    }
    public function edit($id){
        $user = User::find($id);
        return view('pages.useredit', [
            'user' => $user,
            'title' => 'User'
        ]);
    }
    public function update(Request $request, $id){
        User::updateOrCreate(
            ['id' => $id],
            ['name' => $request->name, 'email' => $request->email]
        );
        return redirect('/user')->with('succes', 'Berhasil edit user');
    }
    public function destroy($id){
        User::destroy($id);
        return redirect('/user')->with('succes', 'Berhasil hapus data');
    }
}
