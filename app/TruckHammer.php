<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckHammer extends Model
{
    protected $table = 'truck_hammer';
    public $timestamps = false;
    protected $fillable = ['force', 'frequency'];

    protected static $options = [
        'force' => [
            'name' => 'Сила удара',
            'prefix' => '',
            'suffix' => 'МПа',
        ],
        'frequency' => [
            'name' => 'Частота удара',
            'prefix' => '',
            'suffix' => 'уд/мин',
        ]
    ];

    public function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckHammer', 'tech');
    }
}
