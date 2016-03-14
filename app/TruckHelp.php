<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TruckHelp extends Model
{
    protected $table = 'truck_help';
    public $timestamps = false;
    protected $fillable = ['formula', 'winch', 'price_mileage'];

    protected static $options = [
        'formula' => [
            'name' => 'Колесная формула',
            'prefix' => '',
            'suffix' => '',
        ],
        'winch' => [
            'name' => 'Наличие лебедки',
            'prefix' => '',
            'suffix' => '',
            'is_boolean' => 1
        ]
    ];

    public static function getOptions(){
        return self::$options;
    }

    public function tech()
    {
        return $this->morphMany('App\TruckHelp', 'tech');
    }
}
