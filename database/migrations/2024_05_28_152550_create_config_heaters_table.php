<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('config_heaters', function (Blueprint $table) {
            $table->id();
            $table->string('device_kode');
            $table->foreign('device_kode')->references('kode')->on('devices');
            $table->string('min_temp')->nullable();
            $table->string('max_temp')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('config_heaters');
    }
};
