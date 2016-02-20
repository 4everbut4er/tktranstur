<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckExcavator extends Model
{
    protected $table = 'truck_excavator';
    public $timestamps = false;
    protected $fillable = ['depth', 'width_bucket'];

    protected static $options = [
        'depth' => [
            'name' => 'Глубина копания',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'width_bucket' => [
            'name' => 'Ширина ковша',
            'prefix' => '',
            'suffix' => 'м',
        ]
    ];

    public function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckExcavator', 'tech');
    }
}
