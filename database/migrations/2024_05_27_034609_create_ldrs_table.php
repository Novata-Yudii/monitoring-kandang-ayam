<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ldrs', function (Blueprint $table) {
            $table->id();
            $table->string('device_kode');
            $table->foreign('device_kode')->references('kode')->on('devices');
            $table->decimal('ldr');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ldrs');
    }
};
