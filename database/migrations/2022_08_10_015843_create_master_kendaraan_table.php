<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_kendaraan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plat', 15);
            $table->integer('id_jenis')->unsigned();
            $table->string('merk', 50);
            $table->string('warna', 10);
            $table->date('tanggal_stnk');
            $table->integer('id_status')->unsigned();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->timestamps();

            $table->foreign('id_jenis')->references('id')->on('ref_jenis_kendaraan')->onDelete('cascade');
            $table->foreign('id_status')->references('id')->on('ref_status_kendaraan')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_kendaraan');
    }
}
