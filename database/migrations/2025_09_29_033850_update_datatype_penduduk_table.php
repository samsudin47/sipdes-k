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
        Schema::table('penduduk', function (Blueprint $table) {
            // update type data column here
            $table->unsignedBigInteger('jenis_kelamin')->change();
            $table->unsignedBigInteger('agama')->change();
            $table->unsignedBigInteger('pendidikan_kk')->nullable()->change();
            $table->unsignedBigInteger('pendidikan_sedang')->nullable()->change();
            $table->unsignedBigInteger('pekerjaan')->nullable()->change();
            $table->unsignedBigInteger('status_menikah')->nullable()->change();
            $table->unsignedBigInteger('kk_level')->nullable()->change();
            $table->unsignedBigInteger('warga_negara')->nullable()->change();
            $table->unsignedBigInteger('golongan_darah')->nullable()->change();
            $table->unsignedBigInteger('jamkesnas')->nullable()->change();
            $table->unsignedBigInteger('cacat')->nullable()->change();
            $table->unsignedBigInteger('cara_kb')->nullable()->change();
            $table->unsignedBigInteger('hamil')->nullable()->change();
            $table->unsignedBigInteger('ktp_el')->nullable()->change();
            $table->unsignedBigInteger('status_rekam')->nullable()->change();
            $table->unsignedBigInteger('status_dasar')->nullable()->change();
            $table->unsignedBigInteger('asuransi')->nullable()->change();
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
