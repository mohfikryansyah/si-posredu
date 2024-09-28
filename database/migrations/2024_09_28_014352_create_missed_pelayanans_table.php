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
        Schema::create('missed_pelayanans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('entitas_type');
            $table->string('judul_pelayanan');
            $table->date('tanggal_pelayanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('missed_pelayanans');
    }
};
