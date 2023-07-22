<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pharmacy extends Model
{
    use HasFactory;
    protected $fillable = [
        'avatar',
        'city_id',
        'quarter_id',
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
        return $this->belongsToMany(Group::class, 'pharmacy_groups');
    }
}
