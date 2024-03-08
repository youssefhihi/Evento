<?php

namespace App\Http\Controllers;
use App\Models\event;
use App\Models\Category;
use App\Models\reservation;
use Illuminate\Http\Request;
use App\Http\Requests\EventRequest;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Auth;


class ClientController extends Controller
{
    public function index(Request $request){
        $events = event::where('is_approved', true)->paginate(3);
        $categories = Category::get();
        $filter = $request->input('filter');
        $searchData = $request->input('search');
        $eventSearch = [];
        if($searchData){
        $eventSearch = event::where('title', 'like', '%' . $searchData . '%')->get();
        }elseif($filter){
            $events = event::where('category_id',$filter)->paginate(3);      
        }else{
            $events = event::where('is_approved', true)->paginate(3);
        }
        return view('client.home',compact('events','categories','eventSearch','searchData'));
    }

    public function search(Request $request){
       
        return view('client.home',compact('event'));
    }

    
    public function eventPage(event $event){
        return view("client.eventPage",compact('event'));
    }
    public function tickets(){
        $id = Auth::user()->client->id;
        $tickets = reservation::where('client_id',$id)->where('status',true)->get();
        return view('client.tickets',compact('tickets'));
    }

}
