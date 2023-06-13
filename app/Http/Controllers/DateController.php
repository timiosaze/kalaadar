<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoredateRequest;
use App\Http\Requests\UpdatedateRequest;
use App\Models\date;

class DateController extends Controller
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
     * @param  \App\Http\Requests\StoredateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\date  $date
     * @return \Illuminate\Http\Response
     */
    public function show(date $date)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\date  $date
     * @return \Illuminate\Http\Response
     */
    public function edit(date $date)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedateRequest  $request
     * @param  \App\Models\date  $date
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedateRequest $request, date $date)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\date  $date
     * @return \Illuminate\Http\Response
     */
    public function destroy(date $date)
    {
        //
    }
}
