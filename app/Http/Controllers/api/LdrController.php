<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Ldr;

class LdrController extends Controller
{
    public function index(){
        $ldr = Ldr::all();
        return response()->json([
            'message' => 'Data semua ldr ditemukan',
            'data' => $ldr
        ]);
    }

    public function show($device_kode){ 
        $ldr = Ldr::where('device_kode', $device_kode)->get()[0];
        $pemilik = Device::where('user_id', $ldr->device->user_id)->get()[0];
        return response()->json([
            'message' => 'Data detail ldr ditemukan berdasar kode device',
            'pemilik' => $pemilik->user
        ]);
    }

    public function store(Request $request){
        $ldr = Ldr::create([
            'device_kode' => $request->device_kode,
            'ldr' => $request->ldr
        ]);
        return response()->json([
            'message' => 'Berhasil menambahkan data ldr',
            'data' => $ldr
        ]);
    }

    public function reset(){
        Ldr::truncate();
        return response()->json([
            'message' => 'Berhasil reset data'
        ]);
    }
}
