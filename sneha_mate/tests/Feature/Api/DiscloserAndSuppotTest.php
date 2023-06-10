<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\DiscloserAndSuppot;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DiscloserAndSuppotTest extends TestCase
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
    public function it_gets_discloser_and_suppots_list(): void
    {
        $discloserAndSuppots = DiscloserAndSuppot::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.discloser-and-suppots.index'));

        $response
            ->assertOk()
            ->assertSee($discloserAndSuppots[0]->share_about_yourself);
    }

    /**
     * @test
     */
    public function it_stores_the_discloser_and_suppot(): void
    {
        $data = DiscloserAndSuppot::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.discloser-and-suppots.store'),
            $data
        );

        $this->assertDatabaseHas('discloser_and_suppots', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_discloser_and_suppot(): void
    {
        $discloserAndSuppot = DiscloserAndSuppot::factory()->create();

        $user = User::factory()->create();

        $data = [
            'share_about_yourself' => $this->faker->text(255),
            'kind_of_support' => $this->faker->text(255),
            'disclosing_sharing_status' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.discloser-and-suppots.update', $discloserAndSuppot),
            $data
        );

        $data['id'] = $discloserAndSuppot->id;

        $this->assertDatabaseHas('discloser_and_suppots', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_discloser_and_suppot(): void
    {
        $discloserAndSuppot = DiscloserAndSuppot::factory()->create();

        $response = $this->deleteJson(
            route('api.discloser-and-suppots.destroy', $discloserAndSuppot)
        );

        $this->assertModelMissing($discloserAndSuppot);

        $response->assertNoContent();
    }
}
