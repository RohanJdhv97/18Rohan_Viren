<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\SocialNetwork;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SocialNetworkUsersTest extends TestCase
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
    public function it_gets_social_network_users(): void
    {
        $socialNetwork = SocialNetwork::factory()->create();
        $user = User::factory()->create();

        $socialNetwork->users()->attach($user);

        $response = $this->getJson(
            route('api.social-networks.users.index', $socialNetwork)
        );

        $response->assertOk()->assertSee($user->name);
    }

    /**
     * @test
     */
    public function it_can_attach_users_to_social_network(): void
    {
        $socialNetwork = SocialNetwork::factory()->create();
        $user = User::factory()->create();

        $response = $this->postJson(
            route('api.social-networks.users.store', [$socialNetwork, $user])
        );

        $response->assertNoContent();

        $this->assertTrue(
            $socialNetwork
                ->users()
                ->where('users.id', $user->id)
                ->exists()
        );
    }

    /**
     * @test
     */
    public function it_can_detach_users_from_social_network(): void
    {
        $socialNetwork = SocialNetwork::factory()->create();
        $user = User::factory()->create();

        $response = $this->deleteJson(
            route('api.social-networks.users.store', [$socialNetwork, $user])
        );

        $response->assertNoContent();

        $this->assertFalse(
            $socialNetwork
                ->users()
                ->where('users.id', $user->id)
                ->exists()
        );
    }
}
