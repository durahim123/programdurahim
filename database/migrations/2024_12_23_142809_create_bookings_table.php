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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->integer('layanan_id');
            $table->integer('pasien_id');
            $table->integer('dokter_id');
            $table->date('tgl_booking');
            $table->string('jam_booking');
            $table->double('total_harga', 15, 2);
            $table->integer('status')->default(0);
            $table->integer('metoder');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
