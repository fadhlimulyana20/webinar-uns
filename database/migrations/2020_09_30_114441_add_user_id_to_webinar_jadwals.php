<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToWebinarJadwals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webinar_jadwals', function (Blueprint $table) {
            $table->unsignedBigInteger('id_user_penyelenggara');

            $table->foreign('id_user_penyelenggara')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webinar_jadwals', function (Blueprint $table) {
            $table->dropForeign('webinar_jadwals_id_user_penyelenggara_foreign');
        });
    }
}
