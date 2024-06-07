<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showDevice($id){
        $userDevice = User::find($id);
        $devices=[];
        foreach ($userDevice->device as $i => $device) {
            $devices[$i] = $device->kode;
        }
        return response()->json([
            'message'=>'User device ditemukan',
            'myDevices'=> count($userDevice->device),
            'device_kode'=>$devices,
            'data'=>$userDevice
        ]);
    }

    public function store(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->passwords)
        ]);

        return response()->json([
            'message' => 'Berhasil menambahkan user',
            'data' => $user
        ]);
    }
}
