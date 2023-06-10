<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PerarEducationPersDvpmnt;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserPerarEducationPersDvpmntsTest extends TestCase
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
    public function it_gets_user_perar_education_pers_dvpmnts(): void
    {
        $user = User::factory()->create();
        $perarEducationPersDvpmnts = PerarEducationPersDvpmnt::factory()
            ->count(2)
            ->create([
                'user_id' => $user->id,
            ]);

        $response = $this->getJson(
            route('api.users.perar-education-pers-dvpmnts.index', $user)
        );

        $response
            ->assertOk()
            ->assertSee(
                $perarEducationPersDvpmnts[0]->understanding_life_choices
            );
    }

    /**
     * @test
     */
    public function it_stores_the_user_perar_education_pers_dvpmnts(): void
    {
        $user = User::factory()->create();
        $data = PerarEducationPersDvpmnt::factory()
            ->make([
                'user_id' => $user->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.users.perar-education-pers-dvpmnts.store', $user),
            $data
        );

        $this->assertDatabaseHas('perar_education_pers_dvpmnts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $perarEducationPersDvpmnt = PerarEducationPersDvpmnt::latest(
            'id'
        )->first();

        $this->assertEquals($user->id, $perarEducationPersDvpmnt->user_id);
    }
}
