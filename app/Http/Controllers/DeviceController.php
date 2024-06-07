<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\User;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    public function index(){
        $devices = Device::all();
        return view('pages.device', [
            'devices' => $devices,
            'title' => 'Device'
        ]);
    }

    public function create(){
        $users = User::all();
        return view('pages.devicecreate',[
            'title' => 'Device',
            'users' => $users
        ]);
    }
    
    public function store(Request $request){
        $user_id = User::where('name', $request->name)->get()[0]->id;
        Device::create([
            'user_id' => $user_id,
            'kode' => $request->kode,
            'device_name' => $request->keterangan
        ]);
        return redirect('/device')->with('succes','Berhasil menambahkan data device');
    }

    public function edit($id){
        $device = Device::find($id);
        return view('pages.deviceedit', [
            'device' => $device,
            'title' => 'Device'
        ]);
    }

    public function update(Request $request, $id){
        Device::updateOrCreate(
        [
            'id' => $id
        ],[
            'kode' => $request->kode,
            'device_name' => $request->keterangan
        ]);
        return redirect('/device')->with('succes', 'Berhasil edit user');
    }

    public function destroy($id){
        Device::destroy($id);
        return redirect('/device')->with('succes', 'Berhasil hapus data');
    }
}
