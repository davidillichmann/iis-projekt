<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConcertController extends Controller
{

    public function show(int $concertId)
    {
        $concertItem = iisConcertRepository()->getItemById($concertId);

        return view('concert.show', compact('concertItem'));
    }
}
