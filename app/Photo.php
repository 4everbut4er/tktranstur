<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';
    const PATH_ORIGIN = 's/origin/photo';
    const PATH_MIN = 's/m/photo';
    const PATH_STANDART = 's/s/photo';

    public function imageable()
    {
        return $this->morphTo();
    }
}
