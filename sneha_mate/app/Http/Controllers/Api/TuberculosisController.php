<?php

namespace App\Http\Controllers\Api;

use App\Models\Tuberculosis;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\TuberculosisResource;
use App\Http\Resources\TuberculosisCollection;
use App\Http\Requests\TuberculosisStoreRequest;
use App\Http\Requests\TuberculosisUpdateRequest;

class TuberculosisController extends Controller
{
    public function index(Request $request): TuberculosisCollection
    {
        $this->authorize('view-any', Tuberculosis::class);

        $search = $request->get('search', '');

        $tuberculoses = Tuberculosis::search($search)
            ->latest()
            ->paginate();

        return new TuberculosisCollection($tuberculoses);
    }

    public function store(
        TuberculosisStoreRequest $request
    ): TuberculosisResource {
        $this->authorize('create', Tuberculosis::class);

        $validated = $request->validated();

        $tuberculosis = Tuberculosis::create($validated);

        return new TuberculosisResource($tuberculosis);
    }

    public function show(
        Request $request,
        Tuberculosis $tuberculosis
    ): TuberculosisResource {
        $this->authorize('view', $tuberculosis);

        return new TuberculosisResource($tuberculosis);
    }

    public function update(
        TuberculosisUpdateRequest $request,
        Tuberculosis $tuberculosis
    ): TuberculosisResource {
        $this->authorize('update', $tuberculosis);

        $validated = $request->validated();

        $tuberculosis->update($validated);

        return new TuberculosisResource($tuberculosis);
    }

    public function destroy(
        Request $request,
        Tuberculosis $tuberculosis
    ): Response {
        $this->authorize('delete', $tuberculosis);

        $tuberculosis->delete();

        return response()->noContent();
    }
}
