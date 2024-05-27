<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $fillable = [];

    public function dht(){
        return $this->hasMany(Dht::class);
    }

    public function ldr(){
        return $this->hasMany(Ldr::class);
    }
}
