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
        //
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
    public function store(ReservationRequest $request,event $event)
    {
        
        $data = $request->validated();
        if($event->type_booking == "manual"){
            $data['status'] = false;
            reservation::create($data);
        }else{
            $data['status'] = true;
            reservation::create($data);
            return redirect()->back()->with('success', '');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(reservation $reservation)
    {
        //
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
    public function update(Request $request, reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(reservation $reservation)
    {
        //
    }
   
}
