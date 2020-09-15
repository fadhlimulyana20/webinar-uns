<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinarJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinar_jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('agenda', 150);
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->date('tgl_daftar_awal');
            $table->date('tgl_dater_akhir');
            $table->text('deskripsi');
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
        Schema::dropIfExists('webinar_jadwals');
    }
}
