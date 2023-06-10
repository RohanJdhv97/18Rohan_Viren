<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LivelyhoodAndJobSearch extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'livelihood_training_program',
        'sibling_job',
        'travel_to_art_center_program',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'livelyhood_and_job_searches';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
