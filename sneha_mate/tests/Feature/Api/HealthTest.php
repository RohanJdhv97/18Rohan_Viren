<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Health;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HealthTest extends TestCase
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
    public function it_gets_all_health_list(): void
    {
        $allHealth = Health::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-health.index'));

        $response->assertOk()->assertSee($allHealth[0]->enough_medicines);
    }

    /**
     * @test
     */
    public function it_stores_the_health(): void
    {
        $data = Health::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-health.store'), $data);

        $this->assertDatabaseHas('health', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_health(): void
    {
        $health = Health::factory()->create();

        $user = User::factory()->create();

        $data = [
            'enough_medicines' => $this->faker->text(255),
            'days_meds_missed' => $this->faker->randomNumber(0),
            'cd4_count' => $this->faker->text(255),
            'cd4_count_num' => $this->faker->text(255),
            'viral_load_count' => $this->faker->text(255),
            'viral_count_num' => $this->faker->text(255),
            'fallen_sick' => $this->faker->text(255),
            'share_health' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.all-health.update', $health),
            $data
        );

        $data['id'] = $health->id;

        $this->assertDatabaseHas('health', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_health(): void
    {
        $health = Health::factory()->create();

        $response = $this->deleteJson(route('api.all-health.destroy', $health));

        $this->assertModelMissing($health);

        $response->assertNoContent();
    }
}
