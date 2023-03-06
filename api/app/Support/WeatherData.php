<?php

namespace App\Support;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array request( array $params )
 */
class WeatherData extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'manager.weather';
    }
}
