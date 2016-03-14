<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckNightman extends Model
{
    protected $table = 'truck_nightman';
    public $timestamps = false;
    protected $fillable = ['volume_barrel'];

    protected static $options = [
        'volume_barrel' => [
            'name' => 'Объем бочки',
            'prefix' => '',
            'suffix' => 'м&sup3;',
        ]
    ];

    public static function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckNightman', 'tech');
    }
}
