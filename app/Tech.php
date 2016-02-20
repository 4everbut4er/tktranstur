<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tech extends Model
{
    protected $table = 'tech';

    protected $fillable = [
        'name', 'description', 'price_hourly', 'price_shift', 'maker', 'year'
    ];

    protected $guarded = [
        'id'
    ];

    public function tech()
    {
        return $this->morphTo();
    }

    public function photos()
    {
        return $this->morphMany('App\Photo', 'imageable');
    }

    public static $type_tech = [
        'Bus' => 'Автобус',
        'TruckBackhoeLoader' => 'Экскаватор-погрузчик',
        'TruckTip' => 'Самосвал',
        'TruckHammer' => 'Гидромолот',
        'TruckLoader' => 'Погрузчик',
        'TruckAerialPlatform' => 'Автовышка',
        'TruckUtility' => 'Коммунальная машина',
        'TruckExcavator' => 'Мини-экскаватор',
        'TruckCrane' => 'Кран колесный',
        'TruckExcavatorWheeled' => 'Экскаватор колесный',
        'TruckNightman' => 'Ассенизатор',
        'TruckHelp' => 'Техпомощь',
        'TruckHydrodrill' => 'Гидробур',
    ];
}

