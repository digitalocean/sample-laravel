<?php
namespace App\Http\Controllers\Auth;

//use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class RegisterStep2Controller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showForm()
    {
        $countries = Country::all();
        return view('auth.register_step2', compact('countries'));
    }
    public function postForm(Request $request)
    {
        auth()->user()->update($request->only(['biography', 'country_id']));
        return redirect()->route('home');
    }
}
