<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\OrderDetails;
use App\User;
use App\Outlet;
use App\Customer;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['order_id', 'user_id', 'customer_id', 'outlet_id', 'payment'];
    //user id means emplyee

    public function details(){
        return $this->hasMany(OrderDetails::class, 'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function outlet(){
        return $this->belongsTo(Outlet::class, 'outlet_id');
    }

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
