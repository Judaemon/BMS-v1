<?php

namespace App\Http\Controllers;

use App\Models\Blotter;

class BlottersController extends Controller
{
    public function index()
    {
        return view('blotter.index');
    }
}
