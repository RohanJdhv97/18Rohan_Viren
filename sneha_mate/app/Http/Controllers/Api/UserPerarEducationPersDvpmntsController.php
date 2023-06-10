<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PerarEducationPersDvpmntResource;
use App\Http\Resources\PerarEducationPersDvpmntCollection;

class UserPerarEducationPersDvpmntsController extends Controller
{
    public function index(
        Request $request,
        User $user
    ): PerarEducationPersDvpmntCollection {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $perarEducationPersDvpmnts = $user
            ->perarEducationPersDvpmnts()
            ->search($search)
            ->latest()
            ->paginate();

        return new PerarEducationPersDvpmntCollection(
            $perarEducationPersDvpmnts
        );
    }

    public function store(
        Request $request,
        User $user
    ): PerarEducationPersDvpmntResource {
        $this->authorize('create', PerarEducationPersDvpmnt::class);

        $validated = $request->validate([
            'understanding_life_choices' => ['required', 'max:255', 'string'],
            'qualities_for_pe' => ['required', 'max:255', 'string'],
            'focus_for_independent_And_sustainable_life' => [
                'required',
                'max:255',
                'string',
            ],
            'pe_help_future' => ['required', 'max:255', 'string'],
        ]);

        $perarEducationPersDvpmnt = $user
            ->perarEducationPersDvpmnts()
            ->create($validated);

        return new PerarEducationPersDvpmntResource($perarEducationPersDvpmnt);
    }
}
