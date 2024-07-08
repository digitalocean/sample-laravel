<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Partner;

use function PHPUnit\Framework\isEmpty;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $user = Auth::user();
        $role = $user->roles;
        $request->session()->regenerate();
        session(['role' => $role[0]['name']]); 
        $a = $user->id;
        $partnerId = Partner::where('id', $a)->get();
        if($partnerId->isEmpty()){
            if ($role == 'admin') {
                return redirect()->intended(RouteServiceProvider::HOME);
            } else {
                return redirect('login');
            }
        }

        if ($role == 'admin') {
            return redirect()->intended(RouteServiceProvider::HOME);
        } elseif  ($partnerId != 'null' ){
            return redirect('partner/show',$partnerId[0]['id']);
        } else {
            return redirect('scholar/dashboard');
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
