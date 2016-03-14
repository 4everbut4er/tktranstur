<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckHydrodrill extends Model
{
    protected $table = 'truck_hydrodrill';
    public $timestamps = false;
    protected $fillable = ['depth', 'screw'];

    protected static $options = [
        'depth' => [
            'name' => 'Глубина бурения',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'screw' => [
            'name' => 'Диаметр шнеков',
            'prefix' => '',
            'suffix' => 'мм',
        ]
    ];

    public static function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckHydrodrill', 'tech');
    }
}
