<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Customer;
use App\Http\Resources\Customer as CustomerResource;

class CustomerResourceController extends Controller
{
    public function index(){

        $customers = Customer::all();
        return CustomerResource::collection($customers);
    }

    public function store(Request $request)
    {
        $customer = Customer::create($request->all());
        return new CustomerResource($customer);
    }
}
