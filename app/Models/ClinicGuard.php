<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClinicGuard extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'start_date',
        'end_date',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
