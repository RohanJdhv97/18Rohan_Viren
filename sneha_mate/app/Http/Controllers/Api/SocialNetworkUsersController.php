<?php
namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SocialNetwork;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;

class SocialNetworkUsersController extends Controller
{
    public function index(
        Request $request,
        SocialNetwork $socialNetwork
    ): UserCollection {
        $this->authorize('view', $socialNetwork);

        $search = $request->get('search', '');

        $users = $socialNetwork
            ->users()
            ->search($search)
            ->latest()
            ->paginate();

        return new UserCollection($users);
    }

    public function store(
        Request $request,
        SocialNetwork $socialNetwork,
        User $user
    ): Response {
        $this->authorize('update', $socialNetwork);

        $socialNetwork->users()->syncWithoutDetaching([$user->id]);

        return response()->noContent();
    }

    public function destroy(
        Request $request,
        SocialNetwork $socialNetwork,
        User $user
    ): Response {
        $this->authorize('update', $socialNetwork);

        $socialNetwork->users()->detach($user);

        return response()->noContent();
    }
}
