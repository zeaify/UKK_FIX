<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('petugas_id');
            $table->string('nama_petugas');
            $table->foreign('petugas_id')->references('id')->on('users');
            $table->unsignedBigInteger('nisn_id');
            $table->foreign('nisn_id')->references('id')->on('siswas');
            $table->string('nisn');
            $table->date('tgl_bayar')->default(now());
            $table->string('bulan_dibayar',8);
            $table->string('tahun_dibayar',4);
            $table->unsignedBigInteger('spp_id');
            $table->foreign('spp_id')->references('spp_id')->on('siswas');
            $table->integer('nominal_spp');

            $table->integer('jumlah_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
