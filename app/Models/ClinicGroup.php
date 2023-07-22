<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ClinicGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'clinic_id',
        'group_id',
    ];
    public function clinic(): BelongsTo
    {
        return $this->belongsTo(Clinic::class);
    }
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'clinic.city_id');
    }
}
