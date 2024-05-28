<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function show($device_id){
        $ldr = Ldr::where('device_id', $device_id)->get()[0];
        $device = $ldr->device;
        return response()->json([
            'message' => 'Data detail ldr ditemukan',
            'data' => $device
        ]);
    }

    public function store(Request $request){
        $ldr = Ldr::create([
            'device_id' => $request->device_id,
            'ldr' => $request->ldr
        ]);
        return response()->json([
            'message' => 'Berhasil menambahkan data ldr',
            'data' => $ldr
        ]);
    }
}
