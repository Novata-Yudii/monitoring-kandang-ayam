<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Device;
use Illuminate\Http\Request;
use App\Models\Dht;

class DhtController extends Controller
{
    public function index(){
        $dht = Dht::all();
        return response()->json([
            'message' => 'Data semua dht ditemukan',
            'data' => $dht
        ]);
    }

    public function show($device_kode){ 
        $dht = Dht::where('device_kode', $device_kode)->get()[0];
        $pemilik = Device::where('user_id', $dht->device->user_id)->get()[0];
        return response()->json([
            'message' => 'Data detail dht ditemukan berdasar kode device',
            'pemilik' => $pemilik->user
        ]);
    }

    public function store(Request $request){
        $dht = Dht::create([
            'device_kode' => $request->device_kode,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity
        ]);
        return response()->json([
            'message' => 'Berhasil menambahkan data dht',
            'data' => $dht
        ]);
    }
}
