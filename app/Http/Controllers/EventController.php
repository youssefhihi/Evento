<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->organizer->id;
       
       $events = event::where('organizer_id', $id)->where('is_approved', true)->get();
       return view('organizer.events',compact('events'));
    }
    public function eventNotApproved(){
        $id = Auth::user()->organizer->id;
       
        $events = event::where('organizer_id', $id)->where('is_approved', false)->get();
        return view('organizer.eventsNotApproved',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('organizer.createEvent',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventRequest $request)
    {

        event::create($request->validated());   

        return redirect('/dashbord/events')->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(event $event)
    {
        $categories = Category::all();
        return view('organizer.updateEvent',compact('event','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EventRequest $request, event $event)
    {
        
        $event->update($request->validated());
        return redirect()->back()->with('success', 'Event Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Event Deleted successfully');
    }
}
