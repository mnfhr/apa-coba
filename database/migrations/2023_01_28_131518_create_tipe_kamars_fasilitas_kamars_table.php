<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeKamarsFasilitasKamarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipe_kamars_fasilitas_kamars', function (Blueprint $table) {
            $table->unsignedBigInteger('tipe_kamar_id');
            $table->foreign('tipe_kamar_id')->references('id')->on('tipe_kamars')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('fasilitas_kamar_id');
            $table->foreign('fasilitas_kamar_id')->references('id')->on('fasilitas_kamars')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipe_kamars_fasilitas_kamars');
    }
}
