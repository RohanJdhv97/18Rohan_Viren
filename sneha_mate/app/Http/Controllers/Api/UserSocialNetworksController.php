<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SocialNetwork;
use App\Http\Controllers\Controller;
use App\Http\Resources\SocialNetworkCollection;

class UserSocialNetworksController extends Controller
{
    public function index(Request $request, User $user): SocialNetworkCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $socialNetworks = $user
            ->socialNetworks()
            ->search($search)
            ->latest()
            ->paginate();

        return new SocialNetworkCollection($socialNetworks);
    }

    public function store(
        Request $request,
        User $user,
        SocialNetwork $socialNetwork
    ): Response {
        $this->authorize('update', $user);

        $user->socialNetworks()->syncWithoutDetaching([$socialNetwork->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        User $user,
        SocialNetwork $socialNetwork
    ): Response {
        $this->authorize('update', $user);

        $user->socialNetworks()->detach($socialNetwork);

        return response()->noContent();
    }
}
