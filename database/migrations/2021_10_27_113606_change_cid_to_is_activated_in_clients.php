<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCidToIsActivatedInClients extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            DB::statement("ALTER TABLE `clients` CHANGE `cid` `is_activated` TINYINT(1) DEFAULT '0'");
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
