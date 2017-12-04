<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller {

    public function add(int $eventId)
    {
        $ticketTypeItems = iisTicketTypeRepository()->getItemsById($eventId);
        $concertItem = iisConcertRepository()->getItemByEventId($eventId);

        return view('ticket.add', compact('ticketTypeItems', 'concertItem'));
    }

    public function sent(Request $data, int $concertId)
    {
        $data = $this->validator($data);
        $userId = auth()->user()->iis_userid;

        $code = "";
        // 9 cislic
        for($i = 0; $i < 9; $i++)
        {
            $code .= rand(1, 9);
        }

        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $max = strlen($characters) - 1;

        // 7 pismen
        for($i = 0; $i < 7; $i++)
        {
            $code .= $characters[mt_rand(0, $max)];
        }

        //datum
        $code .= date('dmY');

        iisTicketRepository()->insert($data['ticketTypeId'], $userId, $code);

        return redirect()->route('concert.show', $concertId);
    }


    protected function validator(Request $data)
    {
        return $data->validate([
            'ticketTypeId' => 'required|integer',
        ]);
    }
}
