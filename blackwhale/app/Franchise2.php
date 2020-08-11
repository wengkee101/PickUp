<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Franchise2 extends Model
{
    protected $table = 'franchise2s';
    protected $fillable = ['name', 'email', 'phoneno','location','FoodAndBeverage_Experience','First_Franchise','Message'];
}
