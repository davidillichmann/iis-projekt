<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterpretController extends Controller
{
    public function index()
    {
        $interpretItems = iisInterpretRepository()->getAllItems();

        return view('interpret.index', ['interpretItems' => $interpretItems]);
    }

    public function show($interpretId)
    {
        $interpretItem = iisInterpretRepository()->getItemById($interpretId);

        return view('interpret.show', compact('interpretItem'));
    }

    public function add()
    {
        return view('interpret.add');
    }

    public function sent(Request $data)
    {
        $data = $this->validator($data);
        $data['imagePath'] = request()->image->storeAs('public/images', $data['name'] . '/' . now() . '.jpg');
        $newInterpretId = iisInterpretRepository()->insertGetId($data);

        return redirect(route('interpret.show', $newInterpretId));
    }
    public function editForm(int $interpretId)
    {
        $interpretItem = iisInterpretRepository()->getItemById($interpretId);
        return view('interpret.edit', compact('interpretItem'));
    }

    public function edit(Request $data, int $interpretId)
    {
        $data = $this->validatorEdit($data);
        if($interpretItem = iisInterpretRepository()->getItemById($interpretId)) {
            iisInterpretRepository()->updateById($data, $interpretId);
        }
        return redirect(route('interpret.show', $interpretId));
    }

    public function delete(int $interpretId)
    {
        iisInterpretAtStageRepository()->deleteByInterpretId($interpretId);
        iisInterpretAtConcertRepository()->deleteByInterpretId($interpretId);
        iisInterpretRepository()->deleteById($interpretId);

        return redirect(route('interpret.index'));
    }

    protected function validator(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'members' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'image' => 'required|file',
            'description' => 'required|string|max:255',
            'formed_at' => 'required|date',
        ]);
    }

    protected function validatorEdit(Request $data)
    {
        return $data->validate([
            'name' => 'required|string|max:255',
            'members' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'formed_at' => 'required|date',
        ]);
    }
}
