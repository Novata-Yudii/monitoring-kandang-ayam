<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Dht;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(){
        $device = Device::all();
        return response()->json([
            'message' => 'Device ditemukan',
            'data' => $device
        ]);
    }

    public function store(Request $request){
        $device = Device::create([
            'user_id' => $request->user_id,
            'kode' => $request->kode
        ],);
        return response()->json([
            'message' => 'Berhasil menambahkan data',
            'data' => $device
        ]);
    }

    public function showDht($kode){
        $device = Device::where('kode', $kode)->get()[0];
        return response()->json([
            'message' => 'Berhasil menemukan data dht berdasarkan kode device',
            'data' => $device->dht
        ]);
    }

    public function showLdr($kode){
        $device = Device::where('kode', $kode)->get()[0];
        return response()->json([
            'message' => 'Berhasil menemukan data ldr berdasarkan kode device',
            'data' => $device->ldr
        ]);
    }

    public function showLampu($kode){
        $device = Device::where('kode', $kode)->get()[0];
        return response()->json([
            'message' => 'Berhasil menemukan data config lampu berdasarkan kode device',
            'data' => $device->configlampu
        ]);
    }

    public function showHeater($kode){
        $device = Device::where('kode', $kode)->get()[0];
        return response()->json([
            'message' => 'Berhasil menemukan data config heater berdasarkan kode device',
            'data' => $device->configheater
        ]);
    }
}
