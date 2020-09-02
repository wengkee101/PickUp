<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeaCat extends Model
{
    protected $guarded = [];

    public function series(){
        return $this -> hasMany(TeaSer::class);
    }
}
