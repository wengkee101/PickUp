<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Outlet;
use App\Http\Resources\Outlet as OutletResource;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class OutletController extends Controller
{
    public function rindex()
    {
        $outlets = Outlet::all();
        return OutletResource::collection($outlets);
    }

    public function rshow($id)
    {
        $outlet = Outlet::find($id);
        return new OutletResource($outlet);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets = Outlet::orderBy('id', 'asc')
        // Paginate the contents
        ->paginate(4);
        return view('outlet.index')->with('outlets', $outlets);
        //return $outlets;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required|digits_between:9,11|numeric',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required|digits:5|numeric',
        ]);
        
        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        //store new data
        $outlet = new Outlet;
        
        $outlet->name = request('name');
        $outlet->contact = request('contact');
        $outlet->email = request('email');
        $outlet->address = request('address');
        $outlet->city = request('city');
        $outlet->postcode = request('postcode');
        
        $outlet->save();

        alert('Created Success', 'New things appeared!','success');
        return redirect('/outlets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $outlet =  Outlet::find($id);
        return view('outlet.show')->with('outlet', $outlet);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $outlet =  Outlet::find($id);
        return view('outlet.edit')->with('outlet', $outlet);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'contact' => 'required|digits_between:9,11|numeric',
            'email' => 'required',
            'address' => 'required',
            'city' => 'required',
            'postcode' => 'required|digits:5|numeric',
        ]);

        if ($validator->fails()) {
            toast($validator->messages()->all()[0], 'error');
            return back();
        }

        //update data
        $outlet =  Outlet::find($id);
        
        $outlet->name = request('name');
        $outlet->contact = request('contact');
        $outlet->email = request('email');
        $outlet->address = request('address');
        $outlet->city = request('city');
        $outlet->postcode = request('postcode');
        
        $outlet->save();
        
        alert('Edited Success', $outlet->name." edited", 'success');
        return redirect('/outlets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $outlet=Outlet::find($id);

        $outlet->delete($outlet->id);

        alert('Delete Success',$outlet->name." deleted", 'success');
        return redirect('/outlets');
    }

    public function userSearch(Request $request)
    {
        if(!empty($request->input('q'))) {
            $q = request('q');
            
            $outlets = Outlet::where ( 'city', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'city', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'email', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'address', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'contact', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'name', 'LIKE', '%' . $q . '%' )
                    ->orWhere ( 'postcode', 'LIKE', '%' . $q . '%' )
                    ->get ();
        }
        else 
            return back()->withInfo("No input");  

        if (count ( $outlets ) > 0)
            return view ( 'outlet.search' )->with('outlets', $outlets );
            //return $outlet;
        else
            return back()->withInfo("No Results found!");
            //return "result not found";
    }

}
