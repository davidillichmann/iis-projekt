<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $concertItems = iisConcertRepository()->getAllItems();
        $concertItems = array_slice($concertItems,0,3);
        $festivalItems = iisFestivalRepository()->getAllItems();
        $festivalItems = array_slice($festivalItems,0,3);

        return view('homepage', compact('concertItems', 'festivalItems'));
    }

    public function doc()
    {
        return view('doc');
    }
}
