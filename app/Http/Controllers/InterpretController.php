<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InterpretController extends Controller
{
    public function show($interpretId)
    {
        $interpretItem = iisInterpretRepository()->getItemById($interpretId);

        return view('interpret.show', compact('interpretItem'));
    }
}
