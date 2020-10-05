<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPathFileTemplateToWebinarJadwals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webinar_jadwals', function (Blueprint $table) {
            $table->string('path_file_pamflet')->nullable();
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
            $table->dropColumn('path_file_pamflet')->nullable();
        });
    }
}
