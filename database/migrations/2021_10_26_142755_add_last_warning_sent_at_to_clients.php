<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastWarningSentAtToClients extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->timestamp('last_warning_sent_at')->nullable()->after('city');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
