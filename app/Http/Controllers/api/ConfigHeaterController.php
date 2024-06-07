<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ConfigHeater;
use App\Models\Device;
use Illuminate\Http\Request;

class ConfigHeaterController extends Controller
{
    public function index(){
        $heaters = ConfigHeater::all();
        return response()->json([
            'message' => 'Berhasil menemukan semua data config heater',
            'data' => $heaters
        ]);
    }

    public function show($device_kode){ 
        $confheater = ConfigHeater::where('device_kode', $device_kode)->get()[0];
        $pemilik = Device::where('user_id', $confheater->device->user_id)->get()[0];
        return response()->json([
            'message' => 'Data detail config heater ditemukan berdasar kode device',
            'pemilik' => $pemilik->user
        ]);
    }

    public function store(Request $request){
        $confheater = ConfigHeater::create([
            'device_kode' => $request->device_kode,
            'temperature' => $request->temperature,
            'status' => $request->status
        ]);
        return response()->json([
            'message' => 'Berhasil menambahkan data config heater',
            'data' => $confheater
        ]);
    }
}
