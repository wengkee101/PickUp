<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    protected $fillable = ['tea_id', 'unit_price', 'quantity'];
    protected $casts = [
        'tea_id' => 'array',
        'quantity' => 'array',
        'unit_price' => 'array'
    ];

    public function order(){
        return $this->belongsTo(Order::class, 'order_id');
    }
}
