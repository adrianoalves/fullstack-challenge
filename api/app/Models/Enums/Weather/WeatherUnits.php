<?php

namespace App\Models\Enums\Weather;

use App\Concerns\Enum\IteratesOverCases;

Enum WeatherUnits: string
{
    use IteratesOverCases;

    case METRIC = 'metric';

    case DEFAULT = 'kelvin';

    case IMPERIAL = 'imperial';
}
