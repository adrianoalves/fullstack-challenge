<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserSettings;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserSettingsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_same_count_for_user_and_user_settings(): void
    {
        User::factory(5)
            ->has( UserSettings::factory() )
            ->create();

        $this->assertEquals( UserSettings::count(), User::count() );
    }

    public function test_user_has_only_one_user_settings(): void
    {
        User::factory(1)
            ->has( UserSettings::factory() )
            ->create();

        $user = User::first();

        $this->assertTrue($user->userSettings()->count() === 1);
    }
}
