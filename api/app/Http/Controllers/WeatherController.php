<?php

namespace App\Http\Controllers;

use App\Support\WeatherData;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __invoke()
    {
        return \response()->json( WeatherData::request(['lat' => '-23.67003', 'lon' => -46.71475, 'lang' => 'pt_BR', 'units' => 'metric', 'user_id' => 1]) );
    }
}
