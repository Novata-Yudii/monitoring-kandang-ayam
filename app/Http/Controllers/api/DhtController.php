<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

    public function show($device_id){ //pakek aja device_id dht yg berelasi dgn tabel device
        $dht = Dht::where('device_id', $device_id)->get();
        $device = $dht[0]->device;
        return response()->json([
            'message' => 'Data detail dht ditemukan',
            'data' => $device
        ]);
    }

    public function store(Request $request){
        $dht = Dht::create([
            'device_id' => $request->device_id,
            'temperature' => $request->temperature,
            'humidity' => $request->humidity
        ]);
        return response()->json([
            'message' => 'Berhasil menambahkan data dht',
            'data' => $dht
        ]);
    }
}
