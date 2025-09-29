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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id();

            // Data Identitas
            $table->string('no_kk', 16);
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 100);
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('tempat_lahir', 50);
            $table->date('tanggal_lahir');
            $table->string('agama', 20);

            // Data Pendidikan & Pekerjaan
            $table->string('pendidikan_kk', 50)->nullable();
            $table->string('pendidikan_sedang', 50)->nullable();
            $table->string('pekerjaan', 50)->nullable();

            // Data Keluarga
            $table->string('status_menikah', 20)->nullable();
            $table->string('kk_level', 30)->nullable();
            $table->enum('warga_negara', ['WNI', 'WNA'])->default('WNI');
            $table->string('nik_ayah', 16)->nullable();
            $table->string('nama_ayah', 100)->nullable();
            $table->string('nik_ibu', 16)->nullable();
            $table->string('nama_ibu', 100)->nullable();
            $table->string('golongan_darah', 5)->nullable();

            // Data Dokumen
            $table->string('akta_lahir', 50)->nullable();
            $table->string('dokumen_passport', 50)->nullable();
            $table->date('tanggal_akhir_passport')->nullable();
            $table->string('akta_perkawinan', 50)->nullable();
            $table->date('tanggal_perkawinan')->nullable();
            $table->string('akta_perceraian', 50)->nullable();
            $table->date('tanggal_perceraian')->nullable();
            $table->string('dokumen_kitas', 50)->nullable();

            // Data Kesehatan & Lainnya
            $table->boolean('jamkesnas')->nullable();
            $table->boolean('cacat')->nullable();
            $table->string('cara_kb', 30)->nullable();
            $table->boolean('hamil')->nullable();
            $table->boolean('ktp_el')->nullable();
            $table->string('status_rekam', 30)->nullable();
            $table->string('status_dasar', 30)->nullable();
            $table->string('asuransi', 50)->nullable();

            $table->timestamps();

            // Indexes
            $table->index('no_kk');
            $table->index('nama_lengkap');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
