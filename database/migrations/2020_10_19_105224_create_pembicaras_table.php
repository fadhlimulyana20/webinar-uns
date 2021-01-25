<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembicarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembicaras', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_pembicara', 50);
            $table->string('topik', 50);
            $table->date('tanggal_presentasi');
            $table->time('jam',0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembicaras');
    }
}
