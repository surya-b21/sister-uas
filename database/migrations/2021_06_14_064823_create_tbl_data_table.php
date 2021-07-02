<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('nama_supplier');
            $table->timestamps();
        });

        Schema::create('tbl_databarang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->unsignedBigInteger('id_supplier');
            $table->foreign('id_supplier')->references('id')->on('supplier');
            $table->integer('stok');
            $table->timestamps();
        });

        Schema::create('tbl_barangkeluar', function (Blueprint $table) {
            $table->id('id_barangkeluar');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('tbl_databarang');
            $table->date('tgl_keluar');
            $table->integer('jumlah_keluar');
            $table->text('catatan');
            $table->timestamps();
        });

        Schema::create('tbl_barangmasuk', function (Blueprint $table) {
            $table->id('id_barangmasuk');
            $table->unsignedBigInteger('id_barang');
            $table->foreign('id_barang')->references('id')->on('tbl_databarang');
            $table->date('tgl_masuk');
            $table->integer('jumlah_masuk');
            $table->text('catatan');
            $table->timestamps();
        });

        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('username');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_barangkeluar');
    }
}
