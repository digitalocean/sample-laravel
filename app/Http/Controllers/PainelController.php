<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Painel;

class PainelController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all () {

        $obj = new Painel();
        $paineis = $obj->all();

        return view('admin.painel',['paineis'=>$paineis]);
    }
}
