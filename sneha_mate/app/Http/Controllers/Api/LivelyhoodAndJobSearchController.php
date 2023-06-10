<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\LivelyhoodAndJobSearch;
use App\Http\Resources\LivelyhoodAndJobSearchResource;
use App\Http\Resources\LivelyhoodAndJobSearchCollection;
use App\Http\Requests\LivelyhoodAndJobSearchStoreRequest;
use App\Http\Requests\LivelyhoodAndJobSearchUpdateRequest;

class LivelyhoodAndJobSearchController extends Controller
{
    public function index(Request $request): LivelyhoodAndJobSearchCollection
    {
        $this->authorize('view-any', LivelyhoodAndJobSearch::class);

        $search = $request->get('search', '');

        $livelyhoodAndJobSearches = LivelyhoodAndJobSearch::search($search)
            ->latest()
            ->paginate();

        return new LivelyhoodAndJobSearchCollection($livelyhoodAndJobSearches);
    }

    public function store(
        LivelyhoodAndJobSearchStoreRequest $request
    ): LivelyhoodAndJobSearchResource {
        $this->authorize('create', LivelyhoodAndJobSearch::class);

        $validated = $request->validated();

        $livelyhoodAndJobSearch = LivelyhoodAndJobSearch::create($validated);

        return new LivelyhoodAndJobSearchResource($livelyhoodAndJobSearch);
    }

    public function show(
        Request $request,
        LivelyhoodAndJobSearch $livelyhoodAndJobSearch
    ): LivelyhoodAndJobSearchResource {
        $this->authorize('view', $livelyhoodAndJobSearch);

        return new LivelyhoodAndJobSearchResource($livelyhoodAndJobSearch);
    }

    public function update(
        LivelyhoodAndJobSearchUpdateRequest $request,
        LivelyhoodAndJobSearch $livelyhoodAndJobSearch
    ): LivelyhoodAndJobSearchResource {
        $this->authorize('update', $livelyhoodAndJobSearch);

        $validated = $request->validated();

        $livelyhoodAndJobSearch->update($validated);

        return new LivelyhoodAndJobSearchResource($livelyhoodAndJobSearch);
    }

    public function destroy(
        Request $request,
        LivelyhoodAndJobSearch $livelyhoodAndJobSearch
    ): Response {
        $this->authorize('delete', $livelyhoodAndJobSearch);

        $livelyhoodAndJobSearch->delete();

        return response()->noContent();
    }
}
