<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\DiscloserAndSuppot;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiscloserAndSuppotResource;
use App\Http\Resources\DiscloserAndSuppotCollection;
use App\Http\Requests\DiscloserAndSuppotStoreRequest;
use App\Http\Requests\DiscloserAndSuppotUpdateRequest;

class DiscloserAndSuppotController extends Controller
{
    public function index(Request $request): DiscloserAndSuppotCollection
    {
        $this->authorize('view-any', DiscloserAndSuppot::class);

        $search = $request->get('search', '');

        $discloserAndSuppots = DiscloserAndSuppot::search($search)
            ->latest()
            ->paginate();

        return new DiscloserAndSuppotCollection($discloserAndSuppots);
    }

    public function store(
        DiscloserAndSuppotStoreRequest $request
    ): DiscloserAndSuppotResource {
        $this->authorize('create', DiscloserAndSuppot::class);

        $validated = $request->validated();

        $discloserAndSuppot = DiscloserAndSuppot::create($validated);

        return new DiscloserAndSuppotResource($discloserAndSuppot);
    }

    public function show(
        Request $request,
        DiscloserAndSuppot $discloserAndSuppot
    ): DiscloserAndSuppotResource {
        $this->authorize('view', $discloserAndSuppot);

        return new DiscloserAndSuppotResource($discloserAndSuppot);
    }

    public function update(
        DiscloserAndSuppotUpdateRequest $request,
        DiscloserAndSuppot $discloserAndSuppot
    ): DiscloserAndSuppotResource {
        $this->authorize('update', $discloserAndSuppot);

        $validated = $request->validated();

        $discloserAndSuppot->update($validated);

        return new DiscloserAndSuppotResource($discloserAndSuppot);
    }

    public function destroy(
        Request $request,
        DiscloserAndSuppot $discloserAndSuppot
    ): Response {
        $this->authorize('delete', $discloserAndSuppot);

        $discloserAndSuppot->delete();

        return response()->noContent();
    }
}
