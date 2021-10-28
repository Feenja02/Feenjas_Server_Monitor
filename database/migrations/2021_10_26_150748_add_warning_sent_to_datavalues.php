<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWarningSentToDatavalues extends Migration
{
    public function up()
    {
        Schema::table('datavalues', function (Blueprint $table) {
            $table->boolean('warning_sent')->default(0)->after('humidity');
        });
    }

    public function down()
    {
        Schema::table('datavalues', function (Blueprint $table) {
            //
        });
    }
}
