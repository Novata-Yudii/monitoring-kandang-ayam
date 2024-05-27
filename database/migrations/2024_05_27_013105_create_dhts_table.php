<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dhts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->constrained(
                table: 'devices', indexName: 'dhts_device_id'
            );
            $table->decimal('temperature');
            $table->decimal('humidity');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dhts');
    }
};
