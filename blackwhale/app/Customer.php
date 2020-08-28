<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Customer extends Model
{
    protected $table = 'customers';
    protected $fillable = ['name', 'contact', 'pickup_time'];
    //customer id

    public function orders(){
        return $this->hasMany(Order::class, 'id');
    }
}
