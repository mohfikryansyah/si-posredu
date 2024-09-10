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
        Schema::create('pemeriksaan_lansias', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('lansia_id');
            $table->uuid('employee_id');
            $table->date('tanggal_pemeriksaan');
            $table->string('tekanan_darah');
            $table->decimal('kolestrol', 5, 1);
            $table->decimal('asam_urat', 5, 1);
            $table->decimal('gula_darah', 5, 1);
            // $table->decimal('suhu_tubuh', 5, 1);
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('lansia_id')->references('id')->on('lansias')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeriksaan_lansias');
    }
};
