<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckExcavatorWheeled extends Model
{
    protected $table = 'truck_excavator_wheeled';
    public $timestamps = false;
    protected $fillable = ['weight', 'capacity'];

    protected static $options = [
        'weight' => [
            'name' => 'Масса экскаватора',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'capacity' => [
            'name' => 'Объем ковша',
            'prefix' => '',
            'suffix' => 'м&sup3;',
        ]
    ];

    public static function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckExcavatorWheeled', 'tech');
    }
}
