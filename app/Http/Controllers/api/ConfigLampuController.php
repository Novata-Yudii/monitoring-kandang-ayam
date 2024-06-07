<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConfigLampu;
use App\Models\Device;
use Illuminate\Http\Request;

class ConfigLampuController extends Controller
{
    public function index(){
        $lampus = ConfigLampu::all();
        return response()->json([
            'message' => 'Berhasil menemukan semua data config lampu',
            'data' => $lampus
        ]);
    }

    public function show($device_kode){ 
        $conflampu = ConfigLampu::where('device_kode', $device_kode)->get()[0];
        $pemilik = Device::where('user_id', $conflampu->device->user_id)->get()[0];
        return response()->json([
            'message' => 'Data detail config lampu ditemukan berdasar kode device',
            'pemilik' => $pemilik->user
        ]);
    }

    public function store(Request $request){
        $conflampu = ConfigLampu::create([
            'device_kode' => $request->device_kode,
            'lamp_on' => $request->lamp_on,
            'lamp_off' => $request->lamp_off
        ]);
        return response()->json([
            'message' => 'Berhasil menambahkan data config lampu',
            'data' => $conflampu
        ]);
    }
}
