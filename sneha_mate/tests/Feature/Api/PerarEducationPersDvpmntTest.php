<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\PerarEducationPersDvpmnt;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PerarEducationPersDvpmntTest extends TestCase
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
    public function it_gets_perar_education_pers_dvpmnts_list(): void
    {
        $perarEducationPersDvpmnts = PerarEducationPersDvpmnt::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(
            route('api.perar-education-pers-dvpmnts.index')
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
    public function it_stores_the_perar_education_pers_dvpmnt(): void
    {
        $data = PerarEducationPersDvpmnt::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(
            route('api.perar-education-pers-dvpmnts.store'),
            $data
        );

        $this->assertDatabaseHas('perar_education_pers_dvpmnts', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_updates_the_perar_education_pers_dvpmnt(): void
    {
        $perarEducationPersDvpmnt = PerarEducationPersDvpmnt::factory()->create();

        $user = User::factory()->create();

        $data = [
            'understanding_life_choices' => $this->faker->text(255),
            'qualities_for_pe' => $this->faker->text(255),
            'focus_for_independent_And_sustainable_life' => $this->faker->text(
                255
            ),
            'pe_help_future' => $this->faker->text(255),
            'user_id' => $user->id,
        ];

        $response = $this->putJson(
            route(
                'api.perar-education-pers-dvpmnts.update',
                $perarEducationPersDvpmnt
            ),
            $data
        );

        $data['id'] = $perarEducationPersDvpmnt->id;

        $this->assertDatabaseHas('perar_education_pers_dvpmnts', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_perar_education_pers_dvpmnt(): void
    {
        $perarEducationPersDvpmnt = PerarEducationPersDvpmnt::factory()->create();

        $response = $this->deleteJson(
            route(
                'api.perar-education-pers-dvpmnts.destroy',
                $perarEducationPersDvpmnt
            )
        );

        $this->assertModelMissing($perarEducationPersDvpmnt);

        $response->assertNoContent();
    }
}
