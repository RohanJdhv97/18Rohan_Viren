<?php

namespace App\Http\Controllers\Api;

use App\Models\PersonalInfo;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\PersonalInfoResource;
use App\Http\Resources\PersonalInfoCollection;
use App\Http\Requests\PersonalInfoStoreRequest;
use App\Http\Requests\PersonalInfoUpdateRequest;

class PersonalInfoController extends Controller
{
    public function index(Request $request): PersonalInfoCollection
    {
        $this->authorize('view-any', PersonalInfo::class);

        $search = $request->get('search', '');

        $personalInfos = PersonalInfo::search($search)
            ->latest()
            ->paginate();

        return new PersonalInfoCollection($personalInfos);
    }

    public function store(
        PersonalInfoStoreRequest $request
    ): PersonalInfoResource {
        $this->authorize('create', PersonalInfo::class);

        $validated = $request->validated();

        $personalInfo = PersonalInfo::create($validated);

        return new PersonalInfoResource($personalInfo);
    }

    public function show(
        Request $request,
        PersonalInfo $personalInfo
    ): PersonalInfoResource {
        $this->authorize('view', $personalInfo);

        return new PersonalInfoResource($personalInfo);
    }

    public function update(
        PersonalInfoUpdateRequest $request,
        PersonalInfo $personalInfo
    ): PersonalInfoResource {
        $this->authorize('update', $personalInfo);

        $validated = $request->validated();

        $personalInfo->update($validated);

        return new PersonalInfoResource($personalInfo);
    }

    public function destroy(
        Request $request,
        PersonalInfo $personalInfo
    ): Response {
        $this->authorize('delete', $personalInfo);

        $personalInfo->delete();

        return response()->noContent();
    }
}
