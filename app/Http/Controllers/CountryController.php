<?php

namespace App\Http\Controllers;

use App\Http\Resources\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    //
    public function countries()
    {
       return CountryResource::collection(Country::all());
        
    }
}
