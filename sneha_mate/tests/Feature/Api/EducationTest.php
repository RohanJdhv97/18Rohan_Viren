<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Education;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EducationTest extends TestCase
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
    public function it_gets_all_education_list(): void
    {
        $allEducation = Education::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.all-education.index'));

        $response
            ->assertOk()
            ->assertSee($allEducation[0]->current_qualification);
    }

    /**
     * @test
     */
    public function it_stores_the_education(): void
    {
        $data = Education::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.all-education.store'), $data);

        $this->assertDatabaseHas('education', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_education(): void
    {
        $education = Education::factory()->create();

        $user = User::factory()->create();

        $data = [
            'current_qualification' => $this->faker->text(255),
            'orphan_status' => $this->faker->text(255),
            'future_education' => $this->faker->boolean(),
            'desired_field_of_study' => $this->faker->text(255),
            'dropout_status' => $this->faker->boolean(),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.all-education.update', $education),
            $data
        );

        $data['id'] = $education->id;

        $this->assertDatabaseHas('education', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_education(): void
    {
        $education = Education::factory()->create();

        $response = $this->deleteJson(
            route('api.all-education.destroy', $education)
        );

        $this->assertModelMissing($education);

        $response->assertNoContent();
    }
}
