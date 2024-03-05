<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientController extends Controller
{
    public function index(){
        $events = event::where('is_approved', true)->get();
        return view('client.home',compact('events'));
    }

    public function search(){
        $searchData = $request->input('search');
        $event = event::where('title', 'like', '%' . $searchData . '%')->get();
        return view('client.home',compact('event'));
    }

    public function filter(){
        $catgoryID = $request->input('filter');
        $events = event::where('category_id',$catgoryID)->get();
        return view('client.home',compact('events'));
    }

}
