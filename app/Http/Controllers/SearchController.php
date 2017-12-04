<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        request('q');

        $eventRows = iisEventRepository()->searchByRequest(request('q'));
        $allConcertItems = iisConcertRepository()->getAllItems();
        $allFestivalItems = iisFestivalRepository()->getAllItems();
        $concertItems = [];
        foreach($allConcertItems as $concertItem) {
            foreach($eventRows as $eventRow) {
                if($concertItem->getIisEventid() === $eventRow->iis_eventid) {
                    array_push($concertItems, $concertItem);
                }
            }
        }
        $festivalItems = [];
        foreach($allFestivalItems as $festivalItem) {
            foreach($eventRows as $eventRow) {
                if($festivalItem->getIisEventid() === $eventRow->iis_eventid) {
                    array_push($festivalItems, $festivalItem);
                }
            }
        }
        return view('search.index', compact('concertItems', 'festivalItems'));
    }

}
