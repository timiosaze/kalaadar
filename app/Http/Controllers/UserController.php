<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function new_appointment()
    {
        return view('kalaadar.new');
    }

    public function integrations()
    {
        return view('kalaadar.integrations');
    }

    public function account()
    {
        return view('kalaadar.account');
    }
}
