<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Clinic extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'quarter_id',
        'avatar',
        'name',
        'phone',
        'email',
        'description',
        'geolocation',
        'status',
    ];
    public function quarter(): BelongsTo
    {
        return $this->belongsTo(Quarter::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function Groups(): BelongsToMany
    {
        return $this->belongsToMany(Group::class, 'clinic_groups');
    }
}
