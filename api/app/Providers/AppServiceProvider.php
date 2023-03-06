<?php

namespace App\Providers;

use App\Manager\WeatherExternalApiManager;
use App\Services\OpenWeather;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerManagers();
        $this->registerWeatherApis();
    }

    public function registerManagers()
    {
        $this->app->singleton('manager.weather', fn ($app) => new WeatherExternalApiManager($app) );
    }

    public function registerWeatherApis()
    {
        $this->app->singleton('openweather', fn($app) => new OpenWeather(\config('services.openweather') ) );
    }
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
