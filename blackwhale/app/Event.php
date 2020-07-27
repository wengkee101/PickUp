<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $table = 'eventupdate';
    protected $fillable = ['title', 'date', 'content', 'image'];
}
