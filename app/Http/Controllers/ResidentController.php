<?php

namespace App\Http\Controllers;

use App\Models\Resident;

class ResidentController extends Controller
{
    public function index()
    {
        return view('resident.index');
    }
}
