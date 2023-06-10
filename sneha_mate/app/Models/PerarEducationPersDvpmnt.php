<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PerarEducationPersDvpmnt extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'understanding_life_choices',
        'qualities_for_pe',
        'focus_for_independent_And_sustainable_life',
        'pe_help_future',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'perar_education_pers_dvpmnts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
