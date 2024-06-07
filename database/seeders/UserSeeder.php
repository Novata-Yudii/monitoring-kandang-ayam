<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(3)->create();

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456')
        ]);

        User::create([
            'name' => 'Novata Dwi Wahyudi',
            'email' => "novatayudi@gmail.com",
            'password' => Hash::make('123456')
        ]);
    }
}
