<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Scholar;
use App\Models\User;
use App\Models\School;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    public function createBlackScholar(): Response {

        $school =School::get();
        return Inertia::render('Auth/RegisterBlackscholars', [
            'school' => $school,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
            'partner_id' => "1"
        ]);

        $user->assignRole('partner');
        session(['role' => 'partner']);
        event(new Registered($user));

        Auth::login($user);

        return to_route('partner.show',$user->partner_id);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function storeScholar(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash::make($request->password),
        ]);

        $application = Application::create([
            'name' => $request->name,
            'school' => $request->school,
            'graduation_year' => $request->graduation_year,
            'parent_name' => $request->parent_name,
            'parent_email' => $request->email,
        ]);
        $a = $user->id;

        $b = Scholar::create([
            'user_id' => $a,
            'application_id' => $application->id,
            'parent_name' => $request->parent_name,
            'parent_name2' => $request->parent_name2,
            'parent_email' => $request->parent_email,
            'parent_email2' => $request->parent_email2,
            'graduation_year' => $request->graduation_year,
        ]);

        $user->assignRole('scholar');

        event(new Registered($user));

        Auth::login($user);

        return to_route('scholar.dashboard');
    }
}
