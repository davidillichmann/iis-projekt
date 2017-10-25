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

        return view('search.index', compact('concertItems', 'festivalItems'));
    }

}
