<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\reservation;
use App\Models\event;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('layouts.organizerSideBar', function ($view) {
            $id = Auth::user()->organizer->id;
           
           $reservationCount   =  reservation::whereHas('event', function ($query) use ($id) {
                    $query->where('organizer_id', $id);
                })->where('status', false)->count();        
            $view->with('reservationCount', $reservationCount);
        });
        View::composer('layouts.adminSideBar', function ($view) {

            $eventCount   =  event::where('is_approved',false)->count();
          
            $view->with('eventCount', $eventCount);
         });
    }
}
