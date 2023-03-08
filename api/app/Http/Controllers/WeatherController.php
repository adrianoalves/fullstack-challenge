<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Support\WeatherData;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __invoke( User $user )
    {
        return \response()->json( WeatherData::request( $user->translate() ) );
    }
}
