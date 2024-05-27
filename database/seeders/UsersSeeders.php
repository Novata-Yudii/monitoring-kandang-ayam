<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeders extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Novata Dwi Wahyudi',
            'email' => "novatayudi@gmail.com",
            'password' => Hash::make('123456')
        ]);
    }
}
