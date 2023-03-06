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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\User::class)
                ->comment('user id that requested weather data');

            $table->decimal('lat', 10, 8)
                ->nullable(false)
                ->comment('latitude at individual humans precision');

            $table->decimal('lon', 11, 8)
                ->nullable(false)
                ->comment('longitude at individual humans precision');

            $table->string('locale', 5)
                ->default('en_US')
                ->comment('user locale and lang');

            $table->enum('unit', \App\Models\Enums\Weather\WeatherUnits::values())
                ->default(\App\Models\Enums\Weather\WeatherUnits::STANDARD->value)
                ->comment('user unit of measure');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
