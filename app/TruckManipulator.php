<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckManipulator extends Model
{
    protected $table = 'truck_manipulator';
    public $timestamps = false;
    protected $fillable = ['carrying_min', 'carrying_platform', 'length_body', 'length_arrow', 'carrying_max'];

    protected static $options = [
        'carrying_min' => [
            'name' => 'Грузоподъемность(min вылет)',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'carrying_max' => [
            'name' => 'Грузоподъемность(max вылет)',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'carrying_platform' => [
            'name' => 'Грузоподъемность платформы',
            'prefix' => '',
            'suffix' => 'т',
        ],
        'length_body' => [
            'name' => 'Длина кузова',
            'prefix' => '',
            'suffix' => 'м',
        ],
        'length_arrow' => [
            'name' => 'Вылет стрелы',
            'prefix' => '',
            'suffix' => 'м',
        ],
    ];

    public function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckManipulator', 'tech');
    }
}
