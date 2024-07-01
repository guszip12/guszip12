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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_registrasi')->unique();
            $table->string('ktp')->nullable();
            $table->string('name')->nullable();
            $table->string('alamat')->nullable();
            $table->string('hp')->nullable();
            $table->string('email')->unique();
            $table->string('username')->default('Mahasiswa');
            $table->string('password');
            $table->string('asal_sekolah')->nullable();
            $table->string('school_name')->nullable();
            $table->string('surat_kpl')->nullable();
            $table->string('surat_kesbangpol')->nullable();
            $table->string('foto')->nullable();
            $table->date('jadwal_presentasi')->nullable();
            $table->time('jam_presentasi')->nullable();
            $table->string('topik_presentasi')->nullable();
            $table->string('ruangan')->nullable();
            $table->string('bidang')->nullable();
            $table->string('name_seksi')->nullable();
            $table->string('name_pembina')->nullable();
            $table->string('nilai')->nullable();
            $table->string('rekap_laporan')->nullable();
            $table->date('tgl_mulai')->nullable();
            $table->date('tgl_selesai')->nullable();
            $table->string('registration_number')->nullable();
            $table->string('status')->default('Belum Validasi');
            $table->timestamps();
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
