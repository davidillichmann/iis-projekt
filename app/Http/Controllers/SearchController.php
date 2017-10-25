<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function index()
    {
        request('q');

        $concertItems = iisConcertRepository()->getAllItems();
        $festivalItems = iisFestivalRepository()->getAllItems();

        return view('event.index', compact('concertItems', 'festivalItems'));
    }

}
