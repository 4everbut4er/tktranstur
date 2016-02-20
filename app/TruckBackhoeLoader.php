<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckBackhoeLoader extends Model
{
    protected $table = 'truck_backhoe_loader';
    protected $fillable = ['front_bucket', 'back_bucket', 'multi_bucket', 'crab', 'depth', 'ripper'];
    public $timestamps = false;

    protected static $options = [
        'front_bucket' => [
            'name' => 'Объем переднего ковша',
            'prefix' => '',
            'suffix' => 'м&sup3;',
        ],
        'back_bucket' => [
            'name' => 'Ширина заднего ковша',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'multi_bucket' => [
            'name' => 'Ковш 7 в 1',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ],
        'crab' => [
            'name' => 'Крабовый ход',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ],
        'depth' => [
            'name' => 'Глубина копания',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'ripper' => [
            'name' => 'Рыхлитель',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ]
    ];

    public function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckBackhoeLoader', 'tech');
    }
}
