<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Outlet;
use App\OrderDetails;
use App\Customer;
// use App\Http\Resources\Order as OrderResource;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(10);
        return view('staff.order.index')->with('orders', $orders);
    }

    public function show($id){
        $data = array();

        //get order
        $order = Order::where('id', $id)->first();
        array_push($data, $order);

        //get order details
        // $order = Order::find($id);
        // $details = $order->details()->first();
        // $details = $order->load('details')->where('id', $order->order_id)->get();
        $details = OrderDetails::find($order->order_id);
        array_push($data, $details);

        //get outlets
        $order = Order::find($id);
        $outlet = $order->outlet()->first();
        array_push($data, $outlet);

        $order = Order::find($id);
        $customer = $order->customer()->first();
        array_push($data, $customer);

        $subtotal=array();
        for($i =0;$i<count($details->tea_id);$i++){
            $s=0;
            $s=$details->unit_price[$i]*$details->quantity[$i];
            array_push($subtotal, $s);
        }
        array_push($data, $subtotal);

        $total=0;
        for($i =0;$i<count($subtotal);$i++){
            $total+=$subtotal[$i];
        }
        array_push($data, $total);


        // return $data;
        return view('staff.order.show')->with('data', $data);
    }

    public function custIndex(){
        $customers = Customer::paginate(10);
        return view('staff.order.custIndex')->with('customers', $customers);
    }


}