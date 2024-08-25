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
        Schema::create('anaks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('ibu_id')->nullable(); // Kolom ini harus sesuai dengan tipe data pada tabel 'ibu'
            $table->foreign('ibu_id')->references('id')->on('ibus')->onDelete('cascade');
            $table->string('nama');
            $table->string('tempat_tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('golongan_darah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anaks');
    }
};
