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
            $table->foreign('jenis_kelamin')->on('sex')->references('id')->onDelete('cascade');
            $table->foreign('agama')->on('agama')->references('id')->onDelete('cascade');
            $table->foreign('pendidikan_kk')->on('pendidikan_kk')->references('id')->onDelete('cascade');
            $table->foreign('pendidikan_sedang')->on('pendidikan_sedang')->references('id')->onDelete('cascade');
            $table->foreign('pekerjaan')->on('pekerjaan')->references('id')->onDelete('cascade');
            $table->foreign('status_menikah')->on('status_kawin')->references('id')->onDelete('cascade');
            $table->foreign('kk_level')->on('kk_level')->references('id')->onDelete('cascade');
            $table->foreign('warga_negara')->on('warga_negara')->references('id')->onDelete('cascade');
            $table->foreign('golongan_darah')->on('golongan_darah')->references('id')->onDelete('cascade');
            $table->foreign('jamkesnas')->on('jamkesnas')->references('id')->onDelete('cascade');
            $table->foreign('cacat')->on('cacat')->references('id')->onDelete('cascade');
            $table->foreign('cara_kb')->on('cara_kb')->references('id')->onDelete('cascade');
            $table->foreign('hamil')->on('hamil')->references('id')->onDelete('cascade');
            $table->foreign('ktp_el')->on('ktp_el')->references('id')->onDelete('cascade');
            $table->foreign('status_rekam')->on('status_rekam')->references('id')->onDelete('cascade');
            $table->foreign('status_dasar')->on('status_dasar')->references('id')->onDelete('cascade');
            $table->foreign('asuransi')->on('asuransi')->references('id')->onDelete('cascade');
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
