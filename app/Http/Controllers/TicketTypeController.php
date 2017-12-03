<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class TicketTypeController extends Controller {

//    public function add()
//    {
//        return view('concert.add');
//    }
//
//    public function sent(Request $data)
//    {
//        $data = $this->validator($data);
//        $data['imagePath'] = request()->image->storeAs('public/images/', $data['name'] . '/' . now() . '.jpg');
//        $newEventId = iisEventRepository()->insertGetId($data);
//        $newConcertId = iisConcertRepository()->insertGetId($data, $newEventId);
//
//        return redirect(route('concert.show', $newConcertId));
//    }

    public function editForm(int $concertId)
    {
        $concertItem = iisConcertRepository()->getItemById($concertId);
        return view('concert.edit', compact('concertItem'));
    }

    public function edit(Request $data, int $concertId)
    {
        $data = $this->validatorEdit($data);
        if($concertItem = iisConcertRepository()->getItemById($concertId)) {
            iisConcertRepository()->updateById($data, $concertId);
            iisEventRepository()->updateById($data, $concertItem->getIisEventid());
        }
        return redirect(route('concert.show', $concertId));
    }

//    public function addTicketType(int $eventId, Request $data)
//    {
//        $concertId = $data['concertId'];
//        return view('concert.addTicketType', compact('eventId', 'concertId'));
//    }
//
//    public function sentTicketType(Request $data, int $eventId)
//    {
//        $concertId = $data['concertId'];
//        $data = $this->addTicketValidator($data);
//
//        iisTicketTypeRepository()->insertGetId($data, $eventId);
//
//        return redirect(route('concert.show', $concertId));
//    }
//
//    public function deleteTicketType(int $concertId, int $ticketTypeId)
//    {
//        iisTicketTypeRepository()->deleteItemById($ticketTypeId);
//        return redirect(route('concert.show',$concertId));
//    }
//
//    protected function addTicketValidator(Request $data)
//    {
//        return $data->validate([
//            'type' => 'required|string|max:255',
//            'price' => 'required|integer|min:1',
//        ]);
//    }

}
