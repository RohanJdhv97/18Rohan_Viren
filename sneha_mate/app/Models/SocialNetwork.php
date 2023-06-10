<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialNetwork extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'tb_positive',
        'hiv_friends',
        'friends_same_art',
        'where_met_friends',
        'attended_camp',
        'friends_in_camp',
        'topics_of_discussion',
        'likes_in_camp',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'social_networks';

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
