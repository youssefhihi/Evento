<?php

namespace App\Http\Controllers;

use App\Models\reservation;
use App\Models\event;
use Illuminate\Http\Request;
use App\Http\Requests\ReservationRequest;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::where('status',false)->get();
        return view('organizer.reservation',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservationRequest $request, Event $event)
    {
        $data = $request->validated();
  
        if ($event->placesNumber == 0 ) {
            return redirect()->back()->with('noPlace', 'No places available.');
        } else {
            $placesRemaining = $event->placesNumber - $data['number_places'];
            if ($placesRemaining >= 0) {
                if ($event->type_booking == "manual") {
                    $data['status'] = false;
                    Reservation::create($data);
                    $event->update(['placesNumber' => $placesRemaining]); 
                    return redirect()->back()->with('success', 'Reservation successfully created organizer should accept your reservation.');
                } else {
                    $data['status'] = true;
                    Reservation::create($data);
                    $event->update(['placesNumber' => $placesRemaining]);   
                    return redirect()->back()->with('success', 'Reservation successfully created.');
                }              
            } else {            
                return redirect()->back()->with('noPlace', 'Not enough places available');
            }
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( reservation $reservation)
    {

        $reservation->update(['status' => true]);
        return redirect()->back()->with('with','reservation accepted successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        //
    }
   
}
