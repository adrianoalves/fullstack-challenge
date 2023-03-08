<?php

namespace App\Services;

use App\Models\Enums\Weather\WeatherUnits;
use App\Models\Weather;
use App\Services\Concerns\ImplementsWeatherApi;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Cache;

class OpenWeather implements Contracts\WeatherApiContract
{
    use ImplementsWeatherApi;

    protected string $name = 'openweather';

    public function request( array $params ): array
    {
        return $this->getCached( $params );
    }

    public function getCached( array $params ): array
    {
        return Cache::remember("w_{$params['user_id']}", $this->config['ttl'], fn() => $this->requestData( $params ) );
    }

    protected function requestData( array $params ): array
    {
        $client = new Client();
        $result = $client->get( $this->prepareUri( $params ) );
        \throw_if( $result->getStatusCode() !== 200, new \Exception( $result->getReasonPhrase() ?? 'Error Exception' ) );

        $data = \json_decode( $result->getBody()->getContents(), true );
        $data = $this->translate( $data, $params );
        Weather::create(
            \array_merge( $data, [ 'user_id' => $params['user_id'] ] )
        );

        return $data;
    }
    /**
     * Prepares the address to execute a request against the open weather service
     * @param array $params
     * @return string
     */
    public function prepareUri( array $params ): string
    {
        $uri = $this->config['base_uri'];

        foreach ( $params as $key => $value ) {
            $uri = \preg_replace("/\{$key\}/", $value, $uri);
        }

        return $uri;
    }

    public function translate( array $data, array $additional = [] ): array
    {
        return [
            'lat' => $additional['lat'] ?? $data['coord']['lat'],
            'lon' => $additional['lon'] ?? $data['coord']['lon'],
            'temp' => $data['main']['temp'],
            'temp_feels_like' => $data['main']['feels_like'],
            'pressure' => $data['main']['pressure'],
            'humidity' => $data['main']['humidity'],
            'description' => $data['weather'][0]['description'],
            'weather_condition_code' => $data['weather'][0]['id'],
            'service' => $this->name,
            'unit' => $data['units'] ?? $additional['units'] ?? WeatherUnits::STANDARD->value,
        ];
    }
}
