<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TeaSer;
use App\TeaCat;
use Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TeaCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teacat.create');
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
            'image' => 'mimes:jpeg,jpg,png,gif,psd|required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        //store data
        $teacategory = new TeaCat();
        $teacategory->name = $request->input('name');

        if($request->hasfile('image')) {

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('upload/eventupdate', $filename, 'public');

            $teacategory->image = $filename;
        }else{
            return $request;
            $teacategory->image = '';
        }

        $teacategory->save();
    
        return redirect('/teas')->withSuccess('Created Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacategory = TeaCat::find($id);
        //return $teacategory;

        return view('teacat.edit')->with('teacategory', $teacategory);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,psd|required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $teacategory = TeaCat::find($id);

        $teacategory->name = $request->input('name');

        if($request->hasfile('image')) {

            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('/img', $filename, 'public');

            $teacategory->image = $filename;
        }

        $teacategory->save();
    
        return redirect('/teas')->withSuccess('Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacategory = TeaCat::find($id);
        $teacategory->delete($teacategory->id);
        $teaserie = TeaSer::where('tea_cat_id',$id)->delete();
        alert('Delete Success',$teacategory->name." deleted", 'success');
        return redirect('/teas');
    }
}
