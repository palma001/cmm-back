<?php

namespace App\Http\Controllers;

use App\Models\Trailer;
use App\Http\Requests\StoreTrailerRequest;
use App\Http\Requests\UpdateTrailerRequest;

class TrailerController extends Controller
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
     * @param  \App\Http\Requests\StoreTrailerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrailerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function show(Trailer $trailer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function edit(Trailer $trailer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrailerRequest  $request
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrailerRequest $request, Trailer $trailer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trailer  $trailer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trailer $trailer)
    {
        //
    }
}
