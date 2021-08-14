<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PainelModel;

class PainelController extends Controller
{
    public function all () {

        $obj = new PainelModel();
        $paineis = $obj->all();

        return view('admin.index',['paineis'=>$paineis]);
    }
}
