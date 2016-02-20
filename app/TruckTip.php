<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckTip extends Model
{
    protected $table = 'truck_tip';
    public $timestamps = false;
    protected $fillable = ['body_space', 'carrying'];

    protected static $options = [
        'body_space' => [
            'name' => 'Объем кузова',
            'prefix' => '',
            'suffix' => 'м&sup3;',
        ],
        'carrying' => [
            'name' => 'Грузоподъемность',
            'prefix' => '',
            'suffix' => 'т',
        ]
    ];

    public function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckTip', 'tech');
    }
}
