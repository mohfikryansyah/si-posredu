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
        Schema::create('remajas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama');
            $table->string('nik', 16)->unique();
            $table->string('jenis_kelamin');
            $table->string('tempat_tanggal_lahir');
            $table->integer('usia');
            $table->string('alamat');
            $table->string('no_tlp');
            $table->string('nama_orang_tua');
            $table->string('pekerjaan_orang_tua');
            $table->string('golongan_darah');
            $table->string('tanggal_pendaftaran');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('remajas');
    }
};
