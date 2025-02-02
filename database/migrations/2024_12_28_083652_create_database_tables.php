<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Table: tbl_sekolah
        Schema::create('tbl_sekolah', function (Blueprint $table) {
            $table->id('id_sekolah');
            $table->string('npsn', 10);
            $table->string('nss', 20);
            $table->string('nama_sekolah', 50);
            $table->text('alamat' );
            $table->string('no_telp', 15);
            $table->string('website', 50);
            $table->string('email', 50);
            $table->timestamps();
        });

        // Table: tbl_bidang_keahlian
        Schema::create('tbl_bidang_keahlian', function (Blueprint $table) {
            $table->id('id_bidang_keahlian');
            $table->string('kode_bidang_keahlian', 10);
            $table->string('bidang_keahlian', 100);
            $table->timestamps();
        });

        // Table: tbl_program_keahlian
        Schema::create('tbl_program_keahlian', function (Blueprint $table) {
            $table->id('id_program_keahlian');
            $table->unsignedBigInteger('id_bidang_keahlian');
            $table->string('kode_program_keahlian', 10);
            $table->string('program_keahlian', 100);
            $table->timestamps();

            $table->foreign('id_bidang_keahlian')->references('id_bidang_keahlian')->on('tbl_bidang_keahlian')->onDelete('cascade');
        });

        // Table: tbl_konsentrasi_keahlian
        Schema::create('tbl_konsentrasi_keahlian', function (Blueprint $table) {
            $table->id('id_konsentrasi_keahlian');
            $table->unsignedBigInteger('id_program_keahlian');
            $table->string('kode_konsentrasi_keahlian', 10);
            $table->string('konsentrasi_keahlian', 100);
            $table->timestamps();

            $table->foreign('id_program_keahlian')->references('id_program_keahlian')->on('tbl_program_keahlian')->onDelete('cascade');
        });

        // Table: tb_tahun_lulus
        Schema::create('tbl_tahun_lulus', function (Blueprint $table) {
            $table->id('id_tahun_lulus');
            $table->string('tahun_lulus', 10);
            $table->string('keterangan', 50);
            $table->timestamps();
        });

        // Table: tbl_status_alumni
        Schema::create('tbl_status_alumni', function (Blueprint $table) {
            $table->id('id_status_alumni');
            $table->string('status', 25);
            $table->timestamps();
        });

        // Table: tbl_alumni
        Schema::create('tbl_alumni', function (Blueprint $table) {
            $table->id('id_alumni');
            $table->unsignedBigInteger('id_tahun_lulus');
            $table->unsignedBigInteger('id_konsentrasi_keahlian');
            $table->unsignedBigInteger('id_status_alumni');
            $table->string('nisn', 20);
            $table->string('nik', 20);
            $table->string('nama_depan', 50);
            $table->string('nama_belakang', 50);
            $table->string('jenis_kelamin', 10);
            $table->string('tempat_lahir', 20);
            $table->date('tgl_lahir');
            $table->string('alamat', 50);
            $table->string('no_hp', 15);
            $table->string('akun_fb', 50)->nullable();
            $table->string('akun_ig', 50)->nullable();
            $table->string('akun_tiktok', 50)->nullable();
            $table->string('email', 50);
            $table->longText('password');
            $table->enum('status_login', ['0', '1']);
            $table->timestamps();

            $table->foreign('id_tahun_lulus')->references('id_tahun_lulus')->on('tbl_tahun_lulus')->onDelete('cascade');
            $table->foreign('id_konsentrasi_keahlian')->references('id_konsentrasi_keahlian')->on('tbl_konsentrasi_keahlian')->onDelete('cascade');
            $table->foreign('id_status_alumni')->references('id_status_alumni')->on('tbl_status_alumni')->onDelete('cascade');
        });

        // Table: tbl_tracer_kuliah
        Schema::create('tbl_tracer_kuliah', function (Blueprint $table) {
            $table->id('id_tracer_kuliah');
            $table->unsignedBigInteger('id_alumni');
            $table->string('tracer_kuliah_kampus', 45);
            $table->string('tracer_kuliah_status', 45);
            $table->string('tracer_kuliah_jenjang', 45);
            $table->string('tracer_kuliah_jurusan', 45);
            $table->string('tracer_kuliah_linier', 45);
            $table->string('tracer_kuliah_alamat', 45);
            $table->timestamps();

            $table->foreign('id_alumni')->references('id_alumni')->on('tbl_alumni')->onDelete('cascade');
        });

        // Table: tbl_tracer_kerja
        Schema::create('tbl_tracer_kerja', function (Blueprint $table) {
            $table->id('id_tracer_kerja');
            $table->unsignedBigInteger('id_alumni');
            $table->string('tracer_kerja_pekerjaan', 50);
            $table->string('tracer_kerja_nama', 50);
            $table->string('tracer_kerja_jabatan', 50);
            $table->string('tracer_kerja_status', 50);
            $table->string('tracer_kerja_lokasi', 50);
            $table->string('tracer_kerja_alamat', 50);
            $table->date('tracer_kerja_tgl_mulai');
            $table->string('tracer_kerja_gaji', 50);
            $table->timestamps();

            $table->foreign('id_alumni')->references('id_alumni')->on('tbl_alumni')->onDelete('cascade');
        });

        // Table: tbl_testimoni
        Schema::create('tbl_testimoni', function (Blueprint $table) {
            $table->id('id_testimoni');
            $table->unsignedBigInteger('id_alumni');
            $table->longText('testimoni');
            $table->date('tgl_testimoni');
            $table->timestamps();

            $table->foreign('id_alumni')->references('id_alumni')->on('tbl_alumni')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_testimoni');
        Schema::dropIfExists('tbl_tracer_kerja');
        Schema::dropIfExists('tbl_tracer_kuliah');
        Schema::dropIfExists('tbl_alumni');
        Schema::dropIfExists('tbl_status_alumni');
        Schema::dropIfExists('tb_tahun_lulus');
        Schema::dropIfExists('tbl_konsentrasi_keahlian');
        Schema::dropIfExists('tbl_program_keahlian');
        Schema::dropIfExists('tbl_bidang_keahlian');
        Schema::dropIfExists('tbl_sekolah');
    }
}
