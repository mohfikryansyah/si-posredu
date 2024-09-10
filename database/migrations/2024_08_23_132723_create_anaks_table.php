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
            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->string('tempat_tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('nama_ibu');
            $table->string('nama_ayah');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->date('tanggal_pendaftaran');
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
