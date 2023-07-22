<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function quarters(): HasMany
    {
        return $this->hasMany(Quarter::class);
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
