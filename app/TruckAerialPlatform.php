<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckAerialPlatform extends Model
{
    protected $table = 'truck_aerial_platform';
    protected $fillable = ['type', 'height', 'carrying'];
    public $timestamps = false;

    protected static $options = [
        'type' => [
            'name' => 'Тип',
            'prefix' => '',
            'suffix' => '',
        ],
        'height' => [
            'name' => 'Высота подъема',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'carrying' => [
            'name' => 'Грузоподъемность',
            'prefix' => '',
            'suffix' => 'кг',
        ]
    ];

    public static function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckAerialPlatform', 'tech');
    }
}
