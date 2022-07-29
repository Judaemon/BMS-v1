<?php

namespace App\Http\Controllers;

use App\Models\Blotter;

class BlottersController extends Controller
{
    public function index()
    {
        $blotters = Blotter::all();

        return view('blotter.index', compact('blotters'));
    }
}
