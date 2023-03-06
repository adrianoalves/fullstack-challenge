<?php

namespace App\Services\Concerns;

trait ImplementsWeatherApi
{
    public function __construct(
        protected array $config
    ){}

    public function getConfig(): array
    {
        return $this->config;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
