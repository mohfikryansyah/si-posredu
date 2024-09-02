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
        Schema::create('pemeriksaan_remajas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('remaja_id');
            $table->uuid('employee_id');
            $table->date('tanggal_pemeriksaan');
            $table->decimal('berat_badan', 5, 1);
            $table->decimal('tinggi_badan', 5, 1);
            $table->string('tekanan_darah');
            $table->string('konseling_kesehatan');
            $table->enum('pemberian_vitamin', ['Ya', 'Tidak']);
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('remaja_id')->references('id')->on('remajas')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_remajas');
    }
};
