<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\Order as OrderResource;
use App\Order;
use App\Customer;
use App\OrderDetails;
use Validator;

class OrderResourceController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return OrderResource::collection($orders);
    }

    public function store(Request $request)
    {   
        // //validation
        // $validator = Validator::make($request->all(), [
        //     'category_id' => 'required',
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required|numeric',
        //     'image' => 'mimes:jpeg,jpg,png,gif,psd|required',
        // ]);

        $details = new OrderDetails();
        $details->tea_id = $request['tea_id'];
        $details->unit_price = $request['unit_price'];
        $details->quantity = $request['quantity'];
        $details->save();

        $customerId = Customer::latest('id')->pluck('id')->first();
        $detailsId = OrderDetails::latest('id')->pluck('id')->first();

        $order = new Order();
        $order->order_id = $detailsId;
        $order->user_id = $request['user_id'];
        $order->customer_id = $customerId;
        $order->outlet_id = $request['outlet_id'];
        $order->payment = $request['payment'];
        $order->save();

        return new OrderResource($order);
    }
}
