<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->integer('layanan_id');
            $table->integer('jumlah');
            $table->integer('harga_layanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_bookings');
    }
};
