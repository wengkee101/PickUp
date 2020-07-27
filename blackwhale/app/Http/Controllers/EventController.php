<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('eventupdate');
    }

    public function store(Request $request){
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

            return view('/eventupdate');//->with('Event', $event);
    }

    public function display(){
        //$events = Event::all();
        $events = Event::orderBy('created_at','desc')->paginate(5);
        return view('eventupdateform')->with('events', $events);
    }
}
