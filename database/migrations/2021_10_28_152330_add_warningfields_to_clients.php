<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWarningfieldsToClients extends Migration
{
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->timestamp('last_temp_warning_sent_at')->nullable()->after('last_warning_sent_at');
            $table->timestamp('last_hum_warning_sent_at')->nullable()->after('last_temp_warning_sent_at');
        });
    }

    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
