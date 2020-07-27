<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Outlet;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outlets =  Outlet::all();
        return view('outlet.index')->with('outlets', $outlets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
        $outlet = new Outlet;
        
        $outlet->name = request('name');
        $outlet->contact = request('contact');
        $outlet->email = request('email');
        $outlet->address = request('address');
        $outlet->city = request('city');
        $outlet->postcode = request('postcode');
        
        $outlet->save();

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
        $outlet =  Outlet::find($id);
        
        $outlet->name = request('name');
        $outlet->contact = request('contact');
        $outlet->email = request('email');
        $outlet->address = request('address');
        $outlet->city = request('city');
        $outlet->postcode = request('postcode');
        
        $outlet->save();
        
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

        return redirect('/outlets');
    }
}
