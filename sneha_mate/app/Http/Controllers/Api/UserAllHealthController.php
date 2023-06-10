<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\HealthResource;
use App\Http\Resources\HealthCollection;

class UserAllHealthController extends Controller
{
    public function index(Request $request, User $user): HealthCollection
    {
        $this->authorize('view', $user);

        $search = $request->get('search', '');

        $allHealth = $user
            ->allHealth()
            ->search($search)
            ->latest()
            ->paginate();

        return new HealthCollection($allHealth);
    }

    public function store(Request $request, User $user): HealthResource
    {
        $this->authorize('create', Health::class);

        $validated = $request->validate([
            'enough_medicines' => ['required', 'max:255', 'string'],
            'days_meds_missed' => ['required', 'numeric'],
            'cd4_count' => ['required', 'max:255', 'string'],
            'cd4_count_num' => ['required', 'max:255', 'string'],
            'viral_load_count' => ['required', 'max:255', 'string'],
            'viral_count_num' => ['required', 'max:255', 'string'],
            'fallen_sick' => ['required', 'max:255', 'string'],
            'share_health' => ['required', 'max:255', 'string'],
        ]);

        $health = $user->allHealth()->create($validated);

        return new HealthResource($health);
    }
}
