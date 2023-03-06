<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $table = 'weather';
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table( $this->table, function( Blueprint $table ) {
            $table->string('service', 30 )
                ->default( \config('services.default_weather_api' ) )
                ->after('description' )
                ->comment('service used to request data');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
