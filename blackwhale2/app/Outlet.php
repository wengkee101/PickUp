<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $table = '_outlets';
    protected $fillable = ['name', 'contact', 'email', 'address', 'city', 'postcode'];
}
