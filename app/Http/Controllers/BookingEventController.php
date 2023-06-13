<?php

namespace App\Http\Controllers;

use App\Models\BookingEvent;
use App\Models\Event;
use Illuminate\Http\Request;

class BookingEventController extends Controller
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
    public function create(string $slug_name, string $link)
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingEvent  $bookingEvent
     * @return \Illuminate\Http\Response
     */
    public function show($userNameSlug, $link)
    {
        $event = Event::where('eventurl', request()->fullUrl())->with('days', 'payment', 'bookingevent')->get();
        
        return view('kalaadar.book_event', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingEvent  $bookingEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingEvent $bookingEvent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingEvent  $bookingEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingEvent $bookingEvent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingEvent  $bookingEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingEvent $bookingEvent)
    {
        //
    }
}
