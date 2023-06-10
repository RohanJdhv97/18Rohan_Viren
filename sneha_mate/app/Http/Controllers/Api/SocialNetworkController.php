<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\SocialNetwork;
use App\Http\Controllers\Controller;
use App\Http\Resources\SocialNetworkResource;
use App\Http\Resources\SocialNetworkCollection;
use App\Http\Requests\SocialNetworkStoreRequest;
use App\Http\Requests\SocialNetworkUpdateRequest;

class SocialNetworkController extends Controller
{
    public function index(Request $request): SocialNetworkCollection
    {
        $this->authorize('view-any', SocialNetwork::class);

        $search = $request->get('search', '');

        $socialNetworks = SocialNetwork::search($search)
            ->latest()
            ->paginate();

        return new SocialNetworkCollection($socialNetworks);
    }

    public function store(
        SocialNetworkStoreRequest $request
    ): SocialNetworkResource {
        $this->authorize('create', SocialNetwork::class);

        $validated = $request->validated();

        $socialNetwork = SocialNetwork::create($validated);

        return new SocialNetworkResource($socialNetwork);
    }

    public function show(
        Request $request,
        SocialNetwork $socialNetwork
    ): SocialNetworkResource {
        $this->authorize('view', $socialNetwork);

        return new SocialNetworkResource($socialNetwork);
    }

    public function update(
        SocialNetworkUpdateRequest $request,
        SocialNetwork $socialNetwork
    ): SocialNetworkResource {
        $this->authorize('update', $socialNetwork);

        $validated = $request->validated();

        $socialNetwork->update($validated);

        return new SocialNetworkResource($socialNetwork);
    }

    public function destroy(
        Request $request,
        SocialNetwork $socialNetwork
    ): Response {
        $this->authorize('delete', $socialNetwork);

        $socialNetwork->delete();

        return response()->noContent();
    }
}
