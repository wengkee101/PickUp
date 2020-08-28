<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Franchise2;

class FranchiseController extends Controller
{
    public function index(){
        return view('franchise');
    }
    
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required | email',
            'phoneno' => 'required',
            'location' => 'required',
            'FoodAndBeverage_Experience' => 'required',
            'First_Franchise' => 'required',
            'Message' => 'required'
        ]);

        $franchise = new Franchise2();

        $franchise->name = $request->input('name');
        $franchise->email = $request->input('email');
        $franchise->phoneno = $request->input('phoneno');
        $franchise->location = $request->input('location');
        $franchise->FoodAndBeverage_Experience = $request->input('FoodAndBeverage_Experience');
        $franchise->First_Franchise = $request->input('First_Franchise');
        $franchise->Message = $request->input('Message');

        $franchise->save();

        return redirect('/')->withSuccessMessage('Franchise Form successfully submitted');
    }

    public function display(){
        $franchises = Franchise2::orderBy('created_at','desc')->paginate(5);

        return view('FranchiseForm')->with('franchises', $franchises);
    }

    public function userSearch(Request $request)
    {
        if(!empty($request->input('q'))) {
            $q = request('q');
            
            $franchises = Franchise2::where ( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'phoneno', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'location', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'Message', 'LIKE', '%' . $q . '%' )
                    ->get ();
        }
        else 
            return back()->withInfo("No input");  

        if (count ( $franchises ) > 0)
            return view ( 'franchisesearch' )->with('franchises', $franchises);
            //return $outlet;
        else
            return back()->withInfo("No Results found!");
            //return "result not found";
    }
}

