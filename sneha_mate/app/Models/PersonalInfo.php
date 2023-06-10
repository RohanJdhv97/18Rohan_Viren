<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PersonalInfo extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['district', 'gender', 'age', 'user_id'];

    protected $searchableFields = ['*'];

    protected $table = 'personal_infos';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
