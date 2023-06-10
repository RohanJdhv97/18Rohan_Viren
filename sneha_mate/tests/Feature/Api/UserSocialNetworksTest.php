<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SocialNetwork;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserSocialNetworksTest extends TestCase
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
    public function it_gets_user_social_networks(): void
    {
        $user = User::factory()->create();
        $socialNetwork = SocialNetwork::factory()->create();

        $user->socialNetworks()->attach($socialNetwork);

        $response = $this->getJson(
            route('api.users.social-networks.index', $user)
        );

        $response->assertOk()->assertSee($socialNetwork->tb_positive);
    }

    /**
     * @test
     */
    public function it_can_attach_social_networks_to_user(): void
    {
        $user = User::factory()->create();
        $socialNetwork = SocialNetwork::factory()->create();

        $response = $this->postJson(
            route('api.users.social-networks.store', [$user, $socialNetwork])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $user
                ->socialNetworks()
                ->where('social_networks.id', $socialNetwork->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_social_networks_from_user(): void
    {
        $user = User::factory()->create();
        $socialNetwork = SocialNetwork::factory()->create();

        $response = $this->deleteJson(
            route('api.users.social-networks.store', [$user, $socialNetwork])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $user
                ->socialNetworks()
                ->where('social_networks.id', $socialNetwork->id)
                ->exists()
        );
    }
}
