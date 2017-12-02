<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FestivalController extends Controller
{

    public function show($festivalId)
    {
        $festivalItem = iisFestivalRepository()->getItemById($festivalId);

        return view('festival.show', compact('festivalItem'));
    }

    public function add()
    {
        return view('festival.add');
    }

    public function sent(Request $data)
    {
        $data = $this->validator($data);
        $data['imagePath'] = request()->image->storeAs('public/images/', $data['name'] . '/' . now() . '.jpg');
        $newEventId = iisEventRepository()->insertGetId($data);
        $newFestivalId = iisFestivalRepository()->insertGetId($data, $newEventId);

        return redirect(route('festival.show', $newFestivalId));
    }

    public function editForm(int $festivalId)
    {
        $festivalItem = iisFestivalRepository()->getItemById($festivalId);
        return view('festival.edit', compact('festivalItem'));
    }

    public function edit(Request $data, int $festivalId)
    {
        $data = $this->validatorEdit($data);
        if($festivalItem = iisFestivalRepository()->getItemById($festivalId)) {
            iisFestivalRepository()->updateById($data, $festivalId);
            iisEventRepository()->updateById($data, $festivalItem->getIisEventid());
        }
        return redirect(route('festival.show', $festivalId));
    }

    public function delete(int $festivalId, int $eventId)
    {
        $stageItems = iisStageRepository()->getItemsByFestivalId($festivalId);
        foreach($stageItems as $stageItem) {
            iisInterpretAtStageRepository()->deleteByStageId($stageItem->getId());
        }
        iisStageRepository()->deleteByFestivalId($festivalId);
        iisEventRepository()->deleteById($eventId);
        iisFestivalRepository()->deleteById($festivalId);

        return redirect(route('home.index'));
    }

    protected function validator(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'required|file',
            'description' => 'required|string|max:255',
            'interval' => 'required|string|max:255',
            'order' => 'required|integer|max:99999999999',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    }

    protected function validatorEdit(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'interval' => 'required|string|max:255',
            'order' => 'required|integer|max:99999999999',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
    }
}
