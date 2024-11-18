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
        Schema::create('employees', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nip')->nullable();
            $table->enum('jabatan', ['Dokter', 'Perawat', 'Bidan', 'Kader']);
            $table->string('nama');
            $table->string('unit_kerja')->nullable();
            $table->string('no_tlp')->nullable();
            $table->string('tempat_tanggal_lahir')->nullable();
            $table->date('join')->nullable();
            $table->string('avatar')->nullable();
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
