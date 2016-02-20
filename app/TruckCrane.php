<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckCrane extends Model
{
    protected $table = 'truck_crane';
    public $timestamps = false;
    protected $fillable = ['length_arrow', 'carrying_min', 'carrying_max', 'formula'];

    protected static $options = [
        'length_arrow' => [
            'name' => 'Вылет стрелы',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'carrying_min' => [
            'name' => 'Грузоподъемность струлы(min вылет)',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'carrying_max' => [
            'name' => 'Грузоподъемность струлы(max вылет)',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'formula' => [
            'name' => 'Колесная формула',
            'prefix' => '',
            'suffix' => '',
        ]
    ];

    public function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckCrane', 'tech');
    }
}
