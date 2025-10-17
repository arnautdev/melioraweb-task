<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AdScriptTaskControllerTest extends TestCase
{
//    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        Sanctum::actingAs($user, ['*']);
    }

    public function test_unauthorize(): void
    {
        // Remove Sanctum authentication
        $this->app['auth']->forgetGuards();

        $response = $this->postJson(route('api.add-scripts'), [
            'reference_script' => 'Example',
            'outcome_description' => 'Test outcome',
        ]);
        $response->assertUnauthorized();
    }

    public function test_ai_ad_refactor(): void
    {
        $response = $this->postJson(route('api.add-scripts'), [
            'reference_script' => fake()->paragraph(5),
            'outcome_description' => 'Analyze the reference ad script. Identify strengths/weaknesses.
Then produce a new script that matches: {{ $json.outcome_description }}.
Return two sections: `analysis` and `new_script`. Be concise and actionable.',
        ]);
        $response->assertOk();
    }
}
