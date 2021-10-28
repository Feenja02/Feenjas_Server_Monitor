<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePositionOfColumnsInClients extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            DB::statement("ALTER TABLE `datavalues` CHANGE `temperature` `temperature` DOUBLE(8,2) NOT NULL AFTER `client_id`, CHANGE `humidity` `humidity` DOUBLE(8,2) NOT NULL AFTER `temperature`, CHANGE `warning_sent` `warning_sent` TINYINT(1) NOT NULL DEFAULT '0' AFTER `humidity`");
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
