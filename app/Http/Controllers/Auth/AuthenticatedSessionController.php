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
    public function store(LoginRequest $request): RedirectResponse {

        $request->authenticate();
         
        $request->session()->regenerate();
        $user = Auth::user();
        $role = $user->roles; 
        session(['role' => $role[0]['name']]);
        $a = $user->partner_id;
        $partnerId = Partner::where('id', $a)->get();
        if ($partnerId->isNotEmpty()) {
            return to_route('partner.show',$partnerId[0]['id']);
        }

        return redirect('scholars/dashboard');
        
        
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
