<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;

class EventController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $events = Event::all();
        $event = [];
        foreach($events as $row){
            
            //$endadate = $row->end_date."24:00:00";
            $event[] =\Calendar::event(
            $row->title,
            false,
            new \DateTime($row->start_date),
            new \DateTime($row->end_date),
            $row->id,
            [
                'color' => $row->color,
            ]
            );
        }
        //creo mi calendario con opciones:
        $calendar = \Calendar::addEvents($event);
        $calendar->setOptions([
            
            'locale' => 'es',
                
        ]);
        
    
        //->setCallbacks([]);
        
        /*
        $calendar->setOptions([
            
            'locale' => 'es',
            'defaultView' => 'agendaDay',
            'resources'=> [
                [ 'id'=> 'a', 'title'=> 'Room A' ],
                [ 'id'=> 'b', 'title'=> 'Room B' ],
                [ 'id'=> 'c', 'title'=> 'Room C' ],
                [ 'id'=> 'd', 'title'=> 'Room D' ]
            ]
    
        ]);
        
        
        $calendar = \Calendar::addEvents($event)->setOptions([
            'FirstDay' => 1,
            'contentheight' => 650,
            'editable' => false,
            'allDay' => false,
            'aspectRatio' => 2,
            'slotLabelFormat' => 'HH:mm:ss',
            'timeFormat' => 'HH:mm',
              
            ])->setCallbacks([]);
        */
        
        //compact() creates an array from existing variables given as string arguments to it.
        return view('eventpage', compact('events','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function display() {
        return view('crearevento');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        $events = new Event;
        
        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');
        
        $events->save();
        
        return redirect('calendar')->with('success', 'Events Added');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        $events = Event::all ();
        return view ('listaeventos')->with ('events', $events);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events =Event::find($id);
        return view('editarevento', compact('events', 'id'));
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
       $this->validate($request,[
            'title' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        
        $events = Event::find($id);
        
        $events->title = $request->input('title');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');
        
        $events->save();
        echo '<script> alert("Data Stored") </script>';
        
        return redirect('calendar')->with('success', 'Event updated'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $events =Event::find($id);
        $events->delete();
        
        return redirect('calendar')->with('success', 'Event Deleted'); 

        
    }
}
