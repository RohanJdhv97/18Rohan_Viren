<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Health extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'enough_medicines',
        'days_meds_missed',
        'cd4_count',
        'cd4_count_num',
        'viral_load_count',
        'viral_count_num',
        'fallen_sick',
        'share_health',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
