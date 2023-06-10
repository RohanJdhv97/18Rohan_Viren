<?php

namespace App\Http\Controllers\Api;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\EducationResource;
use App\Http\Resources\EducationCollection;
use App\Http\Requests\EducationStoreRequest;
use App\Http\Requests\EducationUpdateRequest;

class EducationController extends Controller
{
    public function index(Request $request): EducationCollection
    {
        $this->authorize('view-any', Education::class);

        $search = $request->get('search', '');

        $allEducation = Education::search($search)
            ->latest()
            ->paginate();

        return new EducationCollection($allEducation);
    }

    public function store(EducationStoreRequest $request): EducationResource
    {
        $this->authorize('create', Education::class);

        $validated = $request->validated();

        $education = Education::create($validated);

        return new EducationResource($education);
    }

    public function show(
        Request $request,
        Education $education
    ): EducationResource {
        $this->authorize('view', $education);

        return new EducationResource($education);
    }

    public function update(
        EducationUpdateRequest $request,
        Education $education
    ): EducationResource {
        $this->authorize('update', $education);

        $validated = $request->validated();

        $education->update($validated);

        return new EducationResource($education);
    }

    public function destroy(Request $request, Education $education): Response
    {
        $this->authorize('delete', $education);

        $education->delete();

        return response()->noContent();
    }
}
