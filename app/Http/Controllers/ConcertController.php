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

    public function addInterpret($concertId)
    {
        $interpretItems = iisInterpretRepository()->getAllItems();
        return view('concert.addInterpret', compact('interpretItems','concertId'));
    }

    public function sentInterpret(Request $data, $concertId)
    {
        $data = $this->addInterpretValidator($data);
        $data['concertId'] = $concertId;
        if(iisInterpretRepository()->getItemById($data['interpretId'])) {
            iisInterpretAtConcertRepository()->insertGetId($data);
        }
        return redirect(route('concert.show', $concertId));
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

    protected function addInterpretValidator(Request $data)
    {
        return $data->validate([
            'interpretId' => 'required|integer',
            'order' => 'required|integer|max:5',
            'date' => 'required|date',
        ]);
    }
}
