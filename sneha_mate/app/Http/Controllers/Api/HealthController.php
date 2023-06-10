<?php

namespace App\Http\Controllers\Api;

use App\Models\Health;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\HealthResource;
use App\Http\Resources\HealthCollection;
use App\Http\Requests\HealthStoreRequest;
use App\Http\Requests\HealthUpdateRequest;

class HealthController extends Controller
{
    public function index(Request $request): HealthCollection
    {
        $this->authorize('view-any', Health::class);

        $search = $request->get('search', '');

        $allHealth = Health::search($search)
            ->latest()
            ->paginate();

        return new HealthCollection($allHealth);
    }

    public function store(HealthStoreRequest $request): HealthResource
    {
        $this->authorize('create', Health::class);

        $validated = $request->validated();

        $health = Health::create($validated);

        return new HealthResource($health);
    }

    public function show(Request $request, Health $health): HealthResource
    {
        $this->authorize('view', $health);

        return new HealthResource($health);
    }

    public function update(
        HealthUpdateRequest $request,
        Health $health
    ): HealthResource {
        $this->authorize('update', $health);

        $validated = $request->validated();

        $health->update($validated);

        return new HealthResource($health);
    }

    public function destroy(Request $request, Health $health): Response
    {
        $this->authorize('delete', $health);

        $health->delete();

        return response()->noContent();
    }
}
