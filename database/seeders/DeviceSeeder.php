<?php

namespace Database\Seeders;

use App\Models\Device;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeviceSeeder extends Seeder
{
    public function run(): void
    {
        Device::create([
            'user_id' => 1,
            'kode' => 'A001',
            'device_name' => 'Umur 1 - 7 hari'
        ]);
        Device::create([
            'user_id' => 1,
            'kode' => 'A002',
            'device_name' => 'Umur 7 - 15 hari'
        ]);
        Device::create([
            'user_id' => 1,
            'kode' => 'A003',
            'device_name' => 'Umur 16 - 23 hari'
        ]);

        Device::create([
            'user_id' => 2,
            'kode' => 'B001',
            'device_name' => 'Umur 1 - 7 hari'
        ]);
        Device::create([
            'user_id' => 2,
            'kode' => 'B002',
            'device_name' => 'Umur 7 - 15 hari'
        ]);
        Device::create([
            'user_id' => 2,
            'kode' => 'B003',
            'device_name' => 'Umur 16 - 23 hari'
        ]);
    }
}
