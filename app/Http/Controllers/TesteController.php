<?php
// https://laravel.com/docs/8.x/database

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TesteController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::select("SELECT * FROM defaultdb.abastecimento WHERE ibm = ?", ['00000000008301']);

        //return view('user.index', ['users' => $users]);
        return json_encode($users);
    }
}