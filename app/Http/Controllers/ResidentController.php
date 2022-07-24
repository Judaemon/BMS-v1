<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Http\Requests\StoreResidentRequest;
use App\Http\Requests\UpdateResidentRequest;

class ResidentController extends Controller
{
    public function index()
    {
        return view('Residents.index');
    }
}
