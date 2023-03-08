<?php

namespace App\Concerns;

trait HasWeatherInfo
{
    public function translate(): array
    {
        $settings = $this->userSettings;

        return [
            'user_id' => $settings->user_id,
            'lat' => $settings->lat,
            'lon' => $settings->lon,
            'lang' => $settings->locale,
            'units' => $settings->unit,
        ];
    }
}
