<?php

namespace App\Services\Contracts;

interface WeatherApiContract
{
    /**
     * Get weather service configuration
     * @return array
     */
    function getConfig(): array;

    /**
     * get the service name identifier
     * @return string
     */
    function getName(): string;

    /**
     * Main weather method to get data from an external api
     * @param array $params
     * @throws Throwable
     * @return array
     */
    function request( array $params ): array;

    /**
     * Translate/Normalize the external api data to the app data
     * @param array $data
     * @return array
     */
    function translate( array $data ): array;
}
