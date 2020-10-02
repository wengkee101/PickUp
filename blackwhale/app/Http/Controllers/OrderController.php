<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Outlet;
use App\OrderDetails;
use App\Customer;
use App\TeaSer;
use PDF;
// use App\Http\Resources\Order as OrderResource;

use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;

class OrderController extends Controller
{
    public function test(Request $request){
        $orders = Order::orderBy('id', 'desc')->get();
        $search = $this->searchOption();
        // return $search;
        return view('staff.order.test', compact(['orders', 'search', 'request']));
    }

    public function index(){
        $orders = Order::orderBy('id', 'desc')->get();
        $search = $this->searchOption();
        // return $search;

        return view('staff.order.index', compact('orders', 'search'));
    }

    public function show($id){
        $orderdata = array();
        $orderdata = $this->get_order_data($id);
        
        // return $orderdata;
        return view('staff.order.show')->with('orderdata', $orderdata);
    }

    public function custIndex(){
        if(request()->has('name'))  $customers = Customer::where('name', request('name'))->get();
        else  $customers = Customer::all();
        return view('staff.order.custIndex')->with('customers', $customers);
    }

    public function hey(Request $request){
        return $request;
    }

    public function userSearch(Request $request)
    {
        // $search = $this->searchOption();

        // if(!empty($request->except('createdAt', '_token'))) {
        if(!empty($request->all())){
            $id = request('id');
            $orderId = request('orderId');
            $customerId = request('customerId');
            $outletId = request('outletId');
            $payment = request('payment');
            $createdAt = request('createdAt');

            $filter = array($id, $orderId, $customerId, $outletId, strtoupper($payment), $createdAt);

            $query = Order::where ('id', 'LIKE', '%' . $id . '%' );
            if($orderId) $query->where('order_id', $orderId);
            if($customerId) $query->where('customer_id', $customerId);
            if($outletId) $query->where('outlet_id', $outletId);
            if($payment) $query->where('payment', $payment);
            if($createdAt) $query->whereDate('created_at', 'LIKE', '%' . $createdAt .'%');
            // return back()->withInfo("No input");
            $orders = $query->get();
            // return $orders; 
        }
        else 
            return back()->withInfo("No input"); 
            
        // return $request->except('createdAt', '_token');

        $custs = Customer::all();
        foreach($custs as $cust){
            if($cust->id == $filter[2]){
                $filter[2] = $cust->name . $cust->id;
            }
        }

        $outs = Outlet::all();
        foreach($outs as $out){
            if($out->id == $filter[3]){
                $filter[3] = $out->name;
            }
        }

        // return $filter;
        if (count ( $orders ) > 0)
            return view ( 'staff.order.search', compact(['orders', 'filter']));
            //return $outlet;
        else
            return back()->withInfo("No Results found!");
            // return "result not found";
    }
    
    public function searchOption(){
        $data = array();
        $customer = Customer::orderBy('name', 'asc')->get();
        $outlet = Outlet::orderBy('name', 'asc')->get();
        array_push($data, $customer);
        array_push($data, $outlet);
        return $data;
    }

    public function pdfpdf(){
        $order = Order::latest('id')->first();
        $customer = $order->customer()->first();
        $outlet = $order->outlet()->first();
        $details = OrderDetails::find($order->order_id);
        $tea_name = array();
        $teas = TeaSer::all();
        for($i = 0;$i < count($teas); $i++){
            for($j = 0;$j < count($details->tea_id); $j++){
                if($teas[$i]->id==$details->tea_id[$j])
                array_push($tea_name, $teas[$i]->name);
            }
        }

        $client = new Party([
            'name'          => 'Golden Whale International Sdn Bhd',
            'phone'         => $outlet->contact,
            'address'       => $outlet->address .', '. $outlet->postcode . ' '. $outlet->city,
            // 'custom_fields' => [
            //     'note'        => 'IDDQD',
            //     'business id' => '365#GG',
            // ],
        ]);

        $customer = new Party([
            'code'          => str_pad($customer->id, 3, "0", STR_PAD_LEFT) ,
            'name'          => 'Miss/Sir/Madam '.$customer->name,
            'phone'         => $customer->contact,
            'custom_fields' => [
                'order number' => '> '.str_pad($order->order_id, 5, "0", STR_PAD_LEFT) .' <',
            ],
        ]);

        $items = array();
        for($i = 0;$i < count($tea_name); $i++){
            $item = (new InvoiceItem())->title($tea_name[$i])->pricePerUnit($details->unit_price[$i])->quantity($details->quantity[$i]);
            array_push($items, $item);
        }

        $notes = [
            'All Sales are Final',
            'No cash refund on any defective items. We will do exchange only.',
            'No refund on issue for example on situations : change of mind or just don\'t like the item. But, we are willing to help on you on exchange.',
            'All SALE and promotional-priced items are non-returnable, non-refundable and non-exchangeable.'
        ];
        $notes = '<ul><li>'.implode("</li><li>", $notes) .'</li></ul>';

        $total_amount = count($tea_name);

        $invoice = Invoice::make('BW E-receipt')
            ->series('BW')
            ->sequence($order->id)
            ->serialNumberFormat('{SEQUENCE}/{SERIES}')
            ->seller($client)
            ->buyer($customer)
            ->date($order->created_at)
            ->dateFormat('d/m/Y')
            ->payUntilDays(14)
            ->currencySymbol('RM')
            ->currencyCode('Ringgit Malaysia')
            ->currencyFormat('{SYMBOL}{VALUE}')
            ->currencyThousandsSeparator('.')
            ->currencyDecimalPoint('.')
            ->filename($client->name . ' ' . $customer->name)
            ->addItems($items)
            // ->hasItemUnits(count($items))
            ->notes($notes)
            // ->total_amount($total_amount)
            // ->logo(public_path('vendor/invoices/sample-logo.png'))
            // You can additionally save generated invoice to configured disk
            ->save('public');
            
        $link = $invoice->url();
        // Then send email to party with link

        // And return invoice itself to browser or have a different view
        return $invoice->stream();
        // return $order;
    }

    public function get_order_data($id){
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
        
        
        $tea_name = array();
        $teas = TeaSer::all();
        for($i = 0;$i < count($teas); $i++){
            for($j = 0;$j < count($details->tea_id); $j++){
                if($teas[$i]->id==$details->tea_id[$j])
                array_push($tea_name, $teas[$i]->name);
            }
        }
        
        array_push($data, $tea_name);
        
        return $data;
    }
}