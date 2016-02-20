<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckUtility extends Model
{
    protected $table = 'truck_utility';
    public $timestamps = false;
    protected $fillable = ['brusk', 'gritter', 'watering', 'dump'];

    protected static $options = [
        'brusk' => [
            'name' => 'Коммунальная щётка',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ],
        'gritter' => [
            'name' => 'Пескоразбрасыватель',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ],
        'watering' => [
            'name' => 'Полевальная установка',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ],
        'dump' => [
            'name' => 'Коммунальный отвал',
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
        return $this->morphMany('App\TruckUtility', 'tech');
    }
}
