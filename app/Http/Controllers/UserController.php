<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function new_appointment()
    {
        return view('kalaadar.new_appointment');
    }

    public function integrations()
    {
        return view('kalaadar.integrations');
    }

    public function account()
    {
        return view('kalaadar.account');
    }
    public function appointment()
    {
        return view('kalaadar.appointment');
    }
    public function test()
    {
        $array = [];
        $arr = ['00', '15', '30', '45'];
        for ($i=0; $i < 24; $i++) { 
            # code...
            foreach ($arr as $j) {
                if($i < 10){
                    $value = '0' . strval($i) . ':' . $j;
                } else {
                    $value = strval($i) . ':' . $j;
                }
                array_push($array, $value);
            }
        }
        return $array;
    }
}
