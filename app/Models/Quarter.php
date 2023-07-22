<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Quarter extends Model
{
    use HasFactory;
    protected $fillable = [
        'city_id',
        'name',
    ];
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
    public function pharmacies(): HasMany
    {
        return $this->hasMany(Pharmacy::class);
    }
    public function clinics(): HasMany
    {
        return $this->hasMany(Clinic::class);
    }
}
