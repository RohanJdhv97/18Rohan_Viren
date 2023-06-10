<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PersonalInfo;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PersonalInfoTest extends TestCase
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
    public function it_gets_personal_infos_list(): void
    {
        $personalInfos = PersonalInfo::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.personal-infos.index'));

        $response->assertOk()->assertSee($personalInfos[0]->district);
    }

    /**
     * @test
     */
    public function it_stores_the_personal_info(): void
    {
        $data = PersonalInfo::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.personal-infos.store'), $data);

        $this->assertDatabaseHas('personal_infos', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_personal_info(): void
    {
        $personalInfo = PersonalInfo::factory()->create();

        $user = User::factory()->create();

        $data = [
            'district' => $this->faker->text(255),
            'gender' => $this->faker->text(255),
            'age' => $this->faker->randomNumber(0),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route('api.personal-infos.update', $personalInfo),
            $data
        );

        $data['id'] = $personalInfo->id;

        $this->assertDatabaseHas('personal_infos', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_personal_info(): void
    {
        $personalInfo = PersonalInfo::factory()->create();

        $response = $this->deleteJson(
            route('api.personal-infos.destroy', $personalInfo)
        );

        $this->assertModelMissing($personalInfo);

        $response->assertNoContent();
    }
}
