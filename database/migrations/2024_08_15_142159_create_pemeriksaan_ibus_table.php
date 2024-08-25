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
            $table->uuid('ibu_hamil_id')->nullable(); // Kolom ini harus sesuai dengan tipe data pada tabel 'ibu'
            $table->foreign('ibu_hamil_id')->references('id')->on('ibu_hamils')->onDelete('cascade');
            $table->uuid('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->decimal('berat_badan', 8, 1);
            $table->decimal('tinggi_badan', 8, 1);
            $table->decimal('tekanan_darah_sistolik', 8, 1);
            $table->decimal('tekanan_darah_diastolik', 8, 1);
            $table->decimal('kadar_gula_darah', 8, 1);
            $table->decimal('kadar_asam_urat', 8, 1);
            $table->decimal('kadar_kolestrol', 8, 1);
            $table->string('riwayat_penyakit');
            $table->string('catatan');
            $table->timestamps();
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
