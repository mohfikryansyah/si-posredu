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
            $table->string('tanggal_pemeriksaan');
            $table->string('usia_kehamilan');
            $table->string('tekanan_darah');
            $table->decimal('berat_badan', 8, 1);
            $table->decimal('tinggi_fundus', 8, 1);
            $table->integer('denyut_jantung_janin');
            $table->string('keluhan');
            $table->string('pemberian_vitamin');
            $table->string('catatan');
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
