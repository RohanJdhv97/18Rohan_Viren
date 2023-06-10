<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\LivelyhoodAndJobSearch;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserLivelyhoodAndJobSearchesTest extends TestCase
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
    public function it_gets_user_livelyhood_and_job_searches(): void
    {
        $user = User::factory()->create();
        $livelyhoodAndJobSearches = LivelyhoodAndJobSearch::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.livelyhood-and-job-searches.index', $user)
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
    public function it_stores_the_user_livelyhood_and_job_searches(): void
    {
        $user = User::factory()->create();
        $data = LivelyhoodAndJobSearch::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.livelyhood-and-job-searches.store', $user),
            $data
        );

        $this->assertDatabaseHas('livelyhood_and_job_searches', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $livelyhoodAndJobSearch = LivelyhoodAndJobSearch::latest('id')->first();

        $this->assertEquals($user->id, $livelyhoodAndJobSearch->user_id);
    }
}
