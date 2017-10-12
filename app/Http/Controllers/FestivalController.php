<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{

    public function show($festivalId)
    {
        return view('festival.show');
    }
}
