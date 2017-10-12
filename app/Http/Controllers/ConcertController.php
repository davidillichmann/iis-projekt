<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConcertController extends Controller
{

    function __construct()
    {
    }


    public function show(int $concertId)
    {
        $concertItem = iisConcertRepository()->getItemById($concertId);
        $eventItem = $concertItem->getEventItem();

        return view('concert.show', compact('concertItem', 'eventItem'));
    }
}
