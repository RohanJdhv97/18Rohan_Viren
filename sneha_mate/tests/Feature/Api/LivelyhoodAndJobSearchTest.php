<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LivelyhoodAndJobSearch;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LivelyhoodAndJobSearchTest extends TestCase
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
    public function it_gets_livelyhood_and_job_searches_list(): void
    {
        $livelyhoodAndJobSearches = LivelyhoodAndJobSearch::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(
            route('api.livelyhood-and-job-searches.index')
        );

        $response
            ->assertOk()
            ->assertSee(
                $livelyhoodAndJobSearches[0]->livelihood_training_program
            );
    }

    /**
     * @test
     */
    public function it_stores_the_livelyhood_and_job_search(): void
    {
        $data = LivelyhoodAndJobSearch::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.livelyhood-and-job-searches.store'),
            $data
        );

        $this->assertDatabaseHas('livelyhood_and_job_searches', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_livelyhood_and_job_search(): void
    {
        $livelyhoodAndJobSearch = LivelyhoodAndJobSearch::factory()->create();

        $user = User::factory()->create();

        $data = [
            'livelihood_training_program' => $this->faker->text(255),
            'sibling_job' => $this->faker->text(255),
            'travel_to_art_center_program' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route(
                'api.livelyhood-and-job-searches.update',
                $livelyhoodAndJobSearch
            ),
            $data
        );

        $data['id'] = $livelyhoodAndJobSearch->id;

        $this->assertDatabaseHas('livelyhood_and_job_searches', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_livelyhood_and_job_search(): void
    {
        $livelyhoodAndJobSearch = LivelyhoodAndJobSearch::factory()->create();

        $response = $this->deleteJson(
            route(
                'api.livelyhood-and-job-searches.destroy',
                $livelyhoodAndJobSearch
            )
        );

        $this->assertModelMissing($livelyhoodAndJobSearch);

        $response->assertNoContent();
    }
}
