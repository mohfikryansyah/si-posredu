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
        Schema::create('pemeriksaan_ibus', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('ibu_id');
            $table->uuid('employee_id');
            $table->date('tanggal_pemeriksaan');
            $table->string('usia_kehamilan');
            $table->string('tekanan_darah');
            $table->decimal('tinggi_badan', 5, 1);
            $table->decimal('berat_badan', 5, 1);
            $table->decimal('tinggi_fundus', 8, 1);
            $table->integer('denyut_jantung_janin');
            $table->decimal('lingkar_lengan_atas', 5,1);
            $table->string('pemeriksaan_lab');
            $table->string('suntik_tetanus_toksoid');
            $table->string('keluhan');
            $table->string('pemberian_vitamin');
            $table->string('catatan');
            $table->integer('pemeriksaan_ke');
            $table->timestamps();

            $table->foreign('ibu_id')->references('id')->on('ibus')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_ibus');
    }
};
