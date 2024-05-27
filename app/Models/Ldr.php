<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ldr extends Model
{
    use HasFactory;
    protected $fillable = ['device_id', 'ldr'];

    public function device(){
        return $this->belongsToMany(Device::class);
    }
}
