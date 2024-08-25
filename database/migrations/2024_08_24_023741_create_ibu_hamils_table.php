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
        Schema::create('ibu_hamils', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('usia_kehamilan');
            $table->integer('nomor_kehamilan');
            $table->date('tanggal_persalinan');
            $table->string('penolong_persalinan');
            $table->string('kondisi_bayi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibu_hamils');
    }
};
