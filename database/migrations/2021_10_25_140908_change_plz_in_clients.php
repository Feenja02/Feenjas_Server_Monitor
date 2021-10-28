<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePlzInClients extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            DB::statement("ALTER TABLE `clients` CHANGE `zip_code` `zip_code` VARCHAR(11) NOT NULL;");
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
