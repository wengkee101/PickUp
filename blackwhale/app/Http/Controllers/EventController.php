<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use RealRashid\SweetAlert\Facades\Alert;


class EventController extends Controller
{
    public function index()
    {
        return view('eventupdate');
    }

    public function store(Request $request){


        $request->validate([
            'title' => 'required',
            'date' => 'required | date',
            'content' => 'required'
        ]);

        $event = new Event();

        $event->title = $request->input('title');
        $event->date = $request->input('date');
        $event->content = $request->input('content');

        if($request->hasfile('image')) {


            /*$file = $request->file('image');
            $extension = $file->getClientOrginalExtension();    //get original extension
            $filename = time() . '.' . $extension;
            $file->move('upload/event/', $filename);*/
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('upload/eventupdate', $filename, 'public');

            $event->image = $filename;
        }else{
            return $request;
            $event->image = '';
        }
        $event->save();

            
            return redirect('/staffhome')->withSuccessMessage('Event Update successfully added');
    }

    public function display(){
        //$events = Event::all();
        $events = Event::orderBy('created_at','desc')->paginate(5);

        if (session('success_message')){ 
            Alert::success('Success', session('success_message'));
        }

        return view('/eventupdateform')->with('events', $events);
    }
}
