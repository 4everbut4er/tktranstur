<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTechTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->float('price_hourly');
            $table->float('price_shift');
            $table->string('maker');
            $table->integer('year');

            $table->integer('tech_id');
            $table->string('tech_type');

            $table->timestamps();
        });

        Schema::create('bus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('capacity');// вместимость
        });

        // экскаватор погрузчик
        Schema::create('truck_backhoe_loader', function (Blueprint $table) {
            $table->increments('id');
            $table->string('front_bucket', 50); // объем переднего ковша
            $table->string('back_bucket', 50); // ширина заднего ковша
            $table->boolean('multi_bucket'); // ковш 7 в 1
            $table->boolean('crab'); // крабовый ход
            $table->string('depth'); // глубина копания
            $table->boolean('ripper'); // рыхлитель
        });

        // самосвал
        Schema::create('truck_tip', function (Blueprint $table) {
            $table->increments('id');
            $table->float('body_space'); // объем кузова
            $table->float('carrying'); // грузоподъемость
        });

        // гидромолот
        Schema::create('truck_hammer', function (Blueprint $table) {
            $table->increments('id');
            $table->float('force'); // сила удара
            $table->float('frequency'); // частота удара
        });

        // погрузчик
        Schema::create('truck_loader', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type'); // тип
            $table->float('height'); // высота подъема
            $table->float('carrying'); // грузоподъемность корзины
        });

        // коммунальная машина
        Schema::create('truck_utility', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('brusk'); // коммунальная щетка
            $table->boolean('gritter'); // пескоразбрасыватель
            $table->boolean('watering'); // полевальная установка
            $table->boolean('dump'); // коммунальный отвал
        });

        // мини экскаватор
        Schema::create('truck_excavator', function (Blueprint $table) {
            $table->increments('id');
            $table->float('depth'); // глубина копания
            $table->float('width_bucket'); // ширина ковша
        });

        // манипулятор
        Schema::create('truck_manipulator', function (Blueprint $table) {
            $table->increments('id');
            $table->float('carrying_min'); // грузоподъмность стрелы min вылет
            $table->float('carrying_platform'); // грузоподъемность платформы
            $table->float('length_body'); // длина кузова
            $table->float('length_arrow'); // вылет стрелы
            $table->float('carrying_max'); // грузоподъмность стрелы max вылет
        });

        // кран колесный
        Schema::create('truck_crane', function (Blueprint $table) {
            $table->increments('id');
            $table->float('length_arrow'); // вылет стрелы
            $table->float('carrying_min'); // грузоподъмность стрелы min вылет
            $table->float('carrying_max'); // грузоподъмность стрелы max вылет
            $table->string('formula'); // колесная формула
        });

        // ассенизатор
        Schema::create('truck_nightman', function (Blueprint $table) {
            $table->increments('id');
            $table->float('volume_barrel'); // объем бочки
        });

        // техпомощь для грузовых автомобилей
        Schema::create('truck_help', function (Blueprint $table) {
            $table->increments('id');
            $table->string('formula'); // колесная формула
            $table->boolean('winch'); // наличие лебедки
        });

        // гидробур
        Schema::create('truck_hydrodrill', function (Blueprint $table) {
            $table->increments('id');
            $table->float('depth'); // глубина бурения
            $table->float('screw'); // диаметр шнеков
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tech');
        Schema::drop('bus');
        Schema::drop('truck_backhoe_loader');
        Schema::drop('truck_tip');
        Schema::drop('truck_hammer');
        Schema::drop('truck_loader');
        Schema::drop('truck_utility');
        Schema::drop('truck_excavator');
        Schema::drop('truck_manipulator');
        Schema::drop('truck_crane');
        Schema::drop('truck_nightman');
        Schema::drop('truck_help');
        Schema::drop('truck_hydrodrill');
    }
}
