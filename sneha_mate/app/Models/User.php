<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\Searchable;
use App\Models\Traits\FilamentTrait;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements FilamentUser
{
    use Notifiable;
    use HasFactory;
    use Searchable;
    use HasApiTokens;
    use FilamentTrait;

    protected $fillable = ['name', 'email', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
    ];

    public function tuberculosis()
    {
        return $this->hasOne(Tuberculosis::class);
    }

    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class);
    }

    public function allHealth()
    {
        return $this->hasMany(Health::class);
    }

    public function education()
    {
        return $this->hasOne(Education::class);
    }

    public function perarEducationPersDvpmnts()
    {
        return $this->hasMany(PerarEducationPersDvpmnt::class);
    }

    public function discloserAndSuppot()
    {
        return $this->hasOne(DiscloserAndSuppot::class);
    }

    public function livelyhoodAndJobSearches()
    {
        return $this->hasMany(LivelyhoodAndJobSearch::class);
    }

    public function socialNetworks()
    {
        return $this->belongsToMany(SocialNetwork::class);
    }

    public function isSuperAdmin(): bool
    {
        return true;
    }
}
