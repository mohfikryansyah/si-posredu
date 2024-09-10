<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('anak_id')->nullable();
            $table->uuid('remaja_id')->nullable();
            $table->uuid('ibu_id')->nullable();
            $table->uuid('lansia_id')->nullable();
            $table->uuid('employee_id')->nullable();
            $table->string('tipe_entitas')->nullable();
            $table->string('fotoProfile')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('ibu_id')->references('id')->on('ibus')->onDelete('cascade');
            $table->foreign('lansia_id')->references('id')->on('lansias')->onDelete('cascade');
            $table->foreign('remaja_id')->references('id')->on('remajas')->onDelete('cascade');
            $table->foreign('anak_id')->references('id')->on('anaks')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
