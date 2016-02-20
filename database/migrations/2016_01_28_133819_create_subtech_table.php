<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubtechTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // автовышка
        Schema::rename('truck_loader', 'truck_aerial_platform');

        // погрузчик
        Schema::create('truck_loader', function (Blueprint $table) {
            $table->increments('id');
            $table->float('body_space'); // объем кузова
            $table->float('carrying'); // грузоподъемость
            $table->float('height'); // высота погрузки
        });

        // колесный экскаватор
        Schema::create('truck_excavator_wheeled', function (Blueprint $table) {
            $table->increments('id');
            $table->float('weight'); // масса
            $table->float('capacity'); // объем ковша
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('truck_loader');
        Schema::drop('truck_excavator_wheeled');
        Schema::rename('truck_aerial_platform', 'truck_loader');
    }
}
