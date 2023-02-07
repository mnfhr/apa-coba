<?php

use App\Models\TipeKamar;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_lists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('nama_pemesan');
            $table->string('no_hp');
            $table->string('email');
            $table->foreignIdFor(TipeKamar::class);
            $table->integer('jml_kamar');
            $table->date('tgl_checkin');
            $table->date('tgl_checkout')->nullable();
            $table->double('total');
            $table->string('PayBy')->nullable();
            $table->boolean('PayEnd')->nullable();
            $table->string('status');
            $table->string('kode_booking');
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
        Schema::dropIfExists('booking_lists');
    }
}
