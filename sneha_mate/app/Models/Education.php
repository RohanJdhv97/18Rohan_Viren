<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Education extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'current_qualification',
        'orphan_status',
        'future_education',
        'desired_field_of_study',
        'dropout_status',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'future_education' => 'boolean',
        'dropout_status' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
