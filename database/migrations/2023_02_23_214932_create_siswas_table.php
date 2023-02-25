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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('nisn', 10);
            $table->char('nis', 8);
            $table->string('nama', 100);
            $table->foreignId('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->text('alamat');
            $table->string('no_telp', 13);
            $table->foreignId('spp_id');
            $table->foreign('spp_id')->references('id')->on('spps');
            $table->integer('bulan')->default(12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
