<?php

namespace App\Manager;

use App\Services as srv;
use Illuminate\Support\Manager;

class WeatherExternalApiManager extends Manager
{
    public function getDefaultDriver()
    {
        return \config('services.default_weather_api');
    }

    protected function createOpenWeatherDriver(): srv\Contracts\WeatherApiContract
    {
        return \app('openweather');
    }
}
