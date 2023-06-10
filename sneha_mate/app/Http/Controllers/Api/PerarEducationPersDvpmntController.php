<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\PerarEducationPersDvpmnt;
use App\Http\Resources\PerarEducationPersDvpmntResource;
use App\Http\Resources\PerarEducationPersDvpmntCollection;
use App\Http\Requests\PerarEducationPersDvpmntStoreRequest;
use App\Http\Requests\PerarEducationPersDvpmntUpdateRequest;

class PerarEducationPersDvpmntController extends Controller
{
    public function index(Request $request): PerarEducationPersDvpmntCollection
    {
        $this->authorize('view-any', PerarEducationPersDvpmnt::class);

        $search = $request->get('search', '');

        $perarEducationPersDvpmnts = PerarEducationPersDvpmnt::search($search)
            ->latest()
            ->paginate();

        return new PerarEducationPersDvpmntCollection(
            $perarEducationPersDvpmnts
        );
    }

    public function store(
        PerarEducationPersDvpmntStoreRequest $request
    ): PerarEducationPersDvpmntResource {
        $this->authorize('create', PerarEducationPersDvpmnt::class);

        $validated = $request->validated();

        $perarEducationPersDvpmnt = PerarEducationPersDvpmnt::create(
            $validated
        );

        return new PerarEducationPersDvpmntResource($perarEducationPersDvpmnt);
    }

    public function show(
        Request $request,
        PerarEducationPersDvpmnt $perarEducationPersDvpmnt
    ): PerarEducationPersDvpmntResource {
        $this->authorize('view', $perarEducationPersDvpmnt);

        return new PerarEducationPersDvpmntResource($perarEducationPersDvpmnt);
    }

    public function update(
        PerarEducationPersDvpmntUpdateRequest $request,
        PerarEducationPersDvpmnt $perarEducationPersDvpmnt
    ): PerarEducationPersDvpmntResource {
        $this->authorize('update', $perarEducationPersDvpmnt);

        $validated = $request->validated();

        $perarEducationPersDvpmnt->update($validated);

        return new PerarEducationPersDvpmntResource($perarEducationPersDvpmnt);
    }

    public function destroy(
        Request $request,
        PerarEducationPersDvpmnt $perarEducationPersDvpmnt
    ): Response {
        $this->authorize('delete', $perarEducationPersDvpmnt);

        $perarEducationPersDvpmnt->delete();

        return response()->noContent();
    }
}
