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
        Schema::create('sex', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('agama', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('pendidikan_kk', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('pendidikan_sedang', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('status_kawin', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('kk_level', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('warga_negara', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('golongan_darah', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('jamkesnas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('cacat', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('cara_kb', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('hamil', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('ktp_el', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('status_rekam', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('status_dasar', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

         Schema::create('asuransi', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     *
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sex');
        Schema::dropIfExists('agama');
        Schema::dropIfExists('pendidikan_kk');
        Schema::dropIfExists('pendidikan_sedang');
        Schema::dropIfExists('pekerjaan');
        Schema::dropIfExists('status_kawin');
        Schema::dropIfExists('kk_level');
        Schema::dropIfExists('warga_negara');
        Schema::dropIfExists('golongan_darah');
        Schema::dropIfExists('jamkesnas');
        Schema::dropIfExists('cacat');
        Schema::dropIfExists('cara_kb');
        Schema::dropIfExists('hamil');
        Schema::dropIfExists('ktp_el');
        Schema::dropIfExists('status_rekam');
        Schema::dropIfExists('status_dasar');
        Schema::dropIfExists('asuransi');
        // Schema::dropIfExists('master');
    }
};
