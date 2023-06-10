<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Health;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserAllHealthTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_user_all_health(): void
    {
        $user = User::factory()->create();
        $allHealth = Health::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(route('api.users.all-health.index', $user));

        $response->assertOk()->assertSee($allHealth[0]->enough_medicines);
    }

    /**
     * @test
     */
    public function it_stores_the_user_all_health(): void
    {
        $user = User::factory()->create();
        $data = Health::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.all-health.store', $user),
            $data
        );

        $this->assertDatabaseHas('health', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $health = Health::latest('id')->first();

        $this->assertEquals($user->id, $health->user_id);
    }
}
