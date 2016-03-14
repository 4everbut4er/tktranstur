<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFieldsToBusAndHelp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bus', function (Blueprint $table) {
            $table->float('price_mileage');
        });
        Schema::table('truck_help', function (Blueprint $table) {
            $table->float('price_mileage');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bus', function (Blueprint $table) {
            $table->dropColumn('price_mileage');
        });
        Schema::table('truck_help', function (Blueprint $table) {
            $table->dropColumn('price_mileage');
        });
    }
}
