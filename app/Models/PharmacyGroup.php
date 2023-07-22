<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PharmacyGroup extends Model
{
    use HasFactory;
    protected $fillable = [
        'pharmacy_id',
        'group_id',
    ];
    public function pharmacy(): BelongsTo
    {
        return $this->belongsTo(Pharmacy::class);
    }
    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }
}
