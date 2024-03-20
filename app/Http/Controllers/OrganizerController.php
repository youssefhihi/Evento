<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\reservation;
use App\Models\event;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index(){
        $id = Auth::user()->organizer->id;
        $eventCount = event::where('organizer_id',$id)->where('is_approved',true)->count();
        $reservationCount = reservation::whereHas('event', function ($query) use ($id) {
            $query->where('organizer_id', $id);
        })->where('status', false)->count();

        $topEvents = Event::whereHas('reservation', function ($query) use ($id) {
            $query->where('organizer_id', $id);
        })
        ->withCount('reservation')
        ->orderByDesc('reservation_count')
        ->get();
    
        
        return view('organizer.dashboard',compact('eventCount','reservationCount','topEvents'));
    }
    
    public function eventPage(event $event){

        return view('organizer.eventPage',compact('event'));
    }
}
