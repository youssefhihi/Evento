<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        

        if ($request->user()->role === 'admin') {
            return redirect()->route('admin'); 
        } elseif ($request->user()->role === 'organizer') {
            if($request->user()->organizer->is_banned){    
                Auth::logout();            
                return redirect()->back()->with('banned', 'Your account has been banned. Please contact the administrator for further assistance.');
        
            }else{
                return redirect()->route('organizer');
            }
        } elseif ($request->user()->role === 'client') {
            if($request->user()->client->is_banned){
                Auth::logout();
                return redirect()->back()->with('banned', 'Your account has been banned. Please contact the administrator for further assistance.');

            }else{
            return redirect()->route('client'); 
            }
        }

    }

   

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
