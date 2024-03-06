<?php

namespace App\Http\Controllers;
use App\Models\event;
use App\Models\Category;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $events = event::where('is_approved', true)->Paginate(6);
        $categories = Category::simplePaginate(4);
        return view('client.home',compact('events','categories'));
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
    public function eventPage(event $event){
        return view("client.eventPage",compact('event'));
    }

}
