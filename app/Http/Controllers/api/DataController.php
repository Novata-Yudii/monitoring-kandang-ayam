<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dht;
use App\Models\Ldr;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function store(Request $request){
        Dht::create([
            'device_kode' => $request->device_kode,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity
        ]);

        Ldr::create([
            'device_kode' => $request->device_kode,
            'ldr' => $request->ldr
        ]);
        
        return response()->json([
            'message' => 'Berhasil menambahkan data',
            'data' => [
                'device_kode' => $request->device_kode,
                'temperature' => $request->temperature,
                'humidity' => $request->humidity,
                'ldr' => $request->ldr
                ]
        ]);
    }
}
