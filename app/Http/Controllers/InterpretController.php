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
}
