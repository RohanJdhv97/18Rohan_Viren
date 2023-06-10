<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiscloserAndSuppot extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'share_about_yourself',
        'kind_of_support',
        'disclosing_sharing_status',
        'user_id',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'discloser_and_suppots';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
