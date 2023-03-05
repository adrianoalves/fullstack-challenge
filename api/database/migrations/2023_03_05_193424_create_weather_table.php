<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('weather', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)
                ->comment('user id that requested weather data');

            $table->decimal('lat', 10, 6)
                ->nullable(false)
                ->comment('latitude at individual humans precision');

            $table->decimal('lon', 10, 6)
                ->nullable(false)
                ->comment('longitude at individual humans precision');

            $table->decimal('temp', 5, 2)
                ->nullable(false)
                ->comment('temperature at the time of request');

            $table->decimal('temp_feels_like', 5, 2)
                ->nullable(true)
                ->comment('human feels like temp');

            $table->decimal('pressure', 5, 2)
                ->nullable(true)
                ->comment('atmos pressure on the sea level');

            $table->decimal('humidity', 5, 2)
                ->nullable(true)
                ->comment('air humidity');

            $table->string('description', 100)
                ->nullable()
                ->comment('weather human description');

            $table->enum('unit', \App\Models\Enums\Weather\WeatherUnits::values())
                ->default(\App\Models\Enums\Weather\WeatherUnits::DEFAULT->value)
                ->comment('unit measure used in the request');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weather');
    }
};
