<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimeResource;
use App\Http\Resources\TimesCollection;
use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    //
    public function times()
    {
        $times =  TimeResource::collection(Time::all());
        return json_decode(json_encode($times, true), true);
    }
}
