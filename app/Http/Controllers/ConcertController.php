<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConcertController extends Controller {

    public function show(int $concertId)
    {
        $concertItem = iisConcertRepository()->getItemById($concertId);

        return view('concert.show', compact('concertItem'));
    }

    public function add()
    {
        return view('concert.add');
    }

    public function sent(Request $data)
    {
        $data = $this->validator($data);
        $data['imagePath'] = request()->image->storeAs('public/images/', $data['name'] . '/' . now() . '.jpg');
        $newEventId = iisEventRepository()->insertGetId($data);
        $newConcertId = iisConcertRepository()->insertGetId($data, $newEventId);

        return redirect(route('concert.show', $newConcertId));
    }

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

    public function delete(int $concertId, int $eventId)
    {
        iisInterpretAtConcertRepository()->deleteByConcertId($concertId);
        iisEventRepository()->deleteById($eventId);
        iisConcertRepository()->deleteById($concertId);

        return redirect(route('home.index'));
    }

    public function addInterpret($concertId)
    {
        $interpretItems = iisInterpretRepository()->getAllItems();
        return view('concert.addInterpret', compact('interpretItems','concertId'));
    }

    public function sentInterpret(Request $data, int $concertId)
    {
        $data = $this->addInterpretValidator($data);
        $data['concertId'] = $concertId;
        if(iisInterpretRepository()->getItemById($data['interpretId'])) {
            iisInterpretAtConcertRepository()->insertGetId($data);
        }
        return redirect(route('concert.show', $concertId));
    }

    public function deleteInterpret(int $concertId, int $concertInterpretId)
    {
        iisInterpretAtConcertRepository()->deleteById($concertInterpretId);
        return redirect(route('concert.show',$concertId));
    }

    protected function validator(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'required|file',
            'description' => 'required|string|max:255',
            'capacity' => 'required|integer|max:99999999999',
            'date' => 'required|date',
        ]);
    }

    protected function validatorEdit(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'capacity' => 'required|integer|max:99999999999',
            'date' => 'required|date',
        ]);
    }

    protected function addInterpretValidator(Request $data)
    {
        return $data->validate([
            'interpretId' => 'required|integer',
            'order' => 'required|integer|max:5',
            'date' => 'required|date',
        ]);
    }

    public function addTicketType(int $eventId, Request $data)
    {
        $concertId = $data['concertId'];
        return view('concert.addTicketType', compact('eventId', 'concertId'));
    }

    public function sentTicketType(Request $data, int $eventId)
    {
        $concertId = $data['concertId'];
        $data = $this->addTicketValidator($data);

        iisTicketTypeRepository()->insertGetId($data, $eventId);

        return redirect(route('concert.show', $concertId));
    }

    public function deleteTicketType(int $concertId, int $ticketTypeId)
    {
        iisTicketTypeRepository()->deleteItemById($ticketTypeId);
        return redirect(route('concert.show',$concertId));
    }

    protected function addTicketValidator(Request $data)
    {
        return $data->validate([
            'type' => 'required|string|max:255',
            'price' => 'required|integer|min:1',
        ]);
    }


}
