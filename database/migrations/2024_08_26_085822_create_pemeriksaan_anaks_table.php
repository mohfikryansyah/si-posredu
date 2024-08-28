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
        Schema::create('pemeriksaan_anaks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('anak_id');
            $table->uuid('employee_id');
            $table->string('tanggal_pemeriksaan');
            $table->decimal('berat_badan', 4, 1);
            $table->decimal('tinggi_badan', 4, 1);
            $table->string('tekanan_darah');
            $table->decimal('suhu_tubuh', 4, 1);
            $table->string('status_imunisasi');
            $table->string('riwayat_penyakit');
            $table->string('catatan');
            $table->timestamps();
            
            $table->foreign('anak_id')->references('id')->on('anaks')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_anaks');
    }
};
