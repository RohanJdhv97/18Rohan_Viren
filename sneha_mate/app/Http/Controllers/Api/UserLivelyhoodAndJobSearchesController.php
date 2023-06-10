<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\LivelyhoodAndJobSearchResource;
use App\Http\Resources\LivelyhoodAndJobSearchCollection;

class UserLivelyhoodAndJobSearchesController extends Controller
{
    public function index(
        Request $request,
        User $user
    ): LivelyhoodAndJobSearchCollection {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $livelyhoodAndJobSearches = $user
            ->livelyhoodAndJobSearches()
            ->search($search)
            ->latest()
            ->paginate();

        return new LivelyhoodAndJobSearchCollection($livelyhoodAndJobSearches);
    }

    public function store(
        Request $request,
        User $user
    ): LivelyhoodAndJobSearchResource {
        $this->authorize('create', LivelyhoodAndJobSearch::class);

        $validated = $request->validate([
            'livelihood_training_program' => ['required', 'max:255', 'string'],
            'sibling_job' => ['required', 'max:255', 'string'],
            'travel_to_art_center_program' => ['required', 'max:255', 'string'],
        ]);

        $livelyhoodAndJobSearch = $user
            ->livelyhoodAndJobSearches()
            ->create($validated);

        return new LivelyhoodAndJobSearchResource($livelyhoodAndJobSearch);
    }
}
