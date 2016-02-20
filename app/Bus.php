<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'bus';
    protected $fillable = ['capacity'];
    public $timestamps = false;

    public function tech()
    {
        return $this->morphMany('App\Tech', 'tech');
    }
}
