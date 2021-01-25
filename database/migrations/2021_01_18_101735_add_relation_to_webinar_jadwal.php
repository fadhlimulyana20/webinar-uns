<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToWebinarJadwal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pembicaras', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('webinar_id')->nullable();
            $table->foreign('webinar_id')->references('id')->on('webinar_jadwals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pembicaras', function (Blueprint $table) {
            //
        });
    }
}
