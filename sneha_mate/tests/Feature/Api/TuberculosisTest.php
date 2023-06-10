<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Tuberculosis;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TuberculosisTest extends TestCase
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
    public function it_gets_tuberculoses_list(): void
    {
        $tuberculoses = Tuberculosis::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.tuberculoses.index'));

        $response->assertOk()->assertSee($tuberculoses[0]->TB_symptoms);
    }

    /**
     * @test
     */
    public function it_stores_the_tuberculosis(): void
    {
        $data = Tuberculosis::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.tuberculoses.store'), $data);

        $this->assertDatabaseHas('tuberculoses', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_tuberculosis(): void
    {
        $tuberculosis = Tuberculosis::factory()->create();

        $user = User::factory()->create();

        $data = [
            'TB_symptoms' => $this->faker->text(255),
            'TB_positive' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.tuberculoses.update', $tuberculosis),
            $data
        );

        $data['id'] = $tuberculosis->id;

        $this->assertDatabaseHas('tuberculoses', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_tuberculosis(): void
    {
        $tuberculosis = Tuberculosis::factory()->create();

        $response = $this->deleteJson(
            route('api.tuberculoses.destroy', $tuberculosis)
        );

        $this->assertModelMissing($tuberculosis);

        $response->assertNoContent();
    }
}
