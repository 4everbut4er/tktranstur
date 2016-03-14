<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckLoader extends Model
{
    protected $table = 'truck_loader';
    public $timestamps = false;
    protected $fillable = ['body_space', 'carrying', 'height'];

    protected static $options = [
        'body_space' => [
            'name' => 'Объем ковша',
            'prefix' => '',
            'suffix' => 'м&sup3;',
        ],
        'carrying' => [
            'name' => 'Грузоподъемность',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'height' => [
            'name' => 'Высота подгрузки',
            'prefix' => '',
            'suffix' => 'м',
        ]
    ];

    public static function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckLoader', 'tech');
    }
}
