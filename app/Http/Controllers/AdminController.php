<?php

namespace App\Http\Controllers;
use App\Models\User; 
use App\Models\Organizer; 
use App\Models\Client; 
use App\Models\event; 
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
   public function index(Request $request){

    $userCount = User::count();
    $organizerCount = Organizer::count();
    $clientCount = Client::count();
    $userBannedCount = User::whereHas('organizer', function ($query) {
        $query->where('is_banned', true);
    })
    ->orWhereHas('client', function ($query) {
        $query->where('is_banned', true);
    })
    ->count();
    $eventCount = event::count();
    $user = $request->input('filter');
    $banned = $request->input('banned');
       
    if($user){
        if ($user === 'organizers') {
            $users = User::whereHas('organizer', function ($query) {
                $query->where('is_banned', false);
            }) ->get();
            
        } elseif ($user === 'clients') {
            $users = User::orWhereHas('client', function ($query) {
                $query->where('is_banned', false);
            })
            ->get();
        } else {
            $users = User::whereHas('organizer', function ($query) {
                $query->where('is_banned', false);
            })
            ->orWhereHas('client', function ($query) {
                $query->where('is_banned', false);
            })
            ->get();
        }
    }elseif($banned) {
        $users = User::whereHas('organizer', function ($query) {
            $query->where('is_banned', true);
        })
        ->orWhereHas('client', function ($query) {
            $query->where('is_banned', true);
        })
        ->get();
    }else{
        $users = User::all();
    }
    return view('admin.dashboard', compact('users','user','eventCount','userCount','clientCount','organizerCount','userBannedCount'));
   }

   public function banUser(Request $request)
    {
        $userId = $request->input('user_id');
        $userRole = $request->input('role');
        
        if ($userRole === 'organizer') {
            $user = Organizer::findOrFail($userId);
        } elseif ($userRole === 'client') {
            $user = Client::findOrFail($userId);
        } else {
            return redirect()->back()->with('error', 'Invalid user role.');
        }

        $user->update(['is_banned' => true]);
    
        return redirect()->back()->with('success', 'User banned successfully.');
    }
    public function unbanUser(Request $request)
        {
            $userId = $request->input('user_id');
            $userRole = $request->input('role');
            
            if ($userRole === 'organizer') {
                $user = Organizer::findOrFail($userId);
            } elseif ($userRole === 'client') {
                $user = Client::findOrFail($userId);
            } else {

                return redirect()->back()->with('error', 'Invalid user role.');
            }
        
            $user->update(['is_banned' => false]);
            
            return redirect()->back()->with('success', 'User unbanned successfully.');
        }

        public function approveEvents(){
            $events = event::where('is_approved', false)->get();
            return view('admin.event',compact('events'));
        }
        public function acceptEvent(event $event)
        { 
            $event->update(['is_approved' => true]);
            return redirect()->back()->with('success', 'Event Approved successfully');
        }
        public function eventPage(event $event){

            return view('admin.eventPage',compact('event'));
        }
        
    
}
