<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Website extends Controller
{
    function index(){
        $result=DB::select(DB::raw("select count(*) as total_address,from residents group by address"));
    }
}
