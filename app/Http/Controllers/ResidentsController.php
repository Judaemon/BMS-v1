<?php

namespace App\Http\Controllers;

use App\Models\Residents;
use App\Http\Requests\StoreResidentsRequest;
use App\Http\Requests\UpdateResidentsRequest;

class ResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreResidentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreResidentsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function show(Residents $residents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function edit(Residents $residents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateResidentsRequest  $request
     * @param  \App\Models\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateResidentsRequest $request, Residents $residents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residents $residents)
    {
        //
    }
}
