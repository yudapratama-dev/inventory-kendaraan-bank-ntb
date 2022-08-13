<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityKendaraanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_kendaraan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_activity', 15);
            $table->integer('id_kendaraan')->unsigned();
            $table->integer('id_divisi')->unsigned();
            $table->integer('id_driver')->unsigned()->nullable();
            $table->string('tujuan', 100);
            $table->integer('id_sts_kendaraan')->unsigned();
            $table->integer('id_sts_activity')->unsigned();
            $table->integer('createdBy')->unsigned();
            $table->integer('updatedBy')->unsigned();
            $table->timestamps();
            
            $table->foreign('id_kendaraan')->references('id')->on('master_kendaraan')->onDelete('cascade');
            $table->foreign('id_divisi')->references('id')->on('ref_divisi')->onDelete('cascade');
            $table->foreign('id_driver')->references('id')->on('master_driver')->onDelete('cascade');
            $table->foreign('id_sts_kendaraan')->references('id')->on('ref_status_kendaraan')->onDelete('cascade');
            $table->foreign('id_sts_activity')->references('id')->on('ref_status_activity')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_kendaraan');
    }
}
