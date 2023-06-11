<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Enrollment extends Model
{
    use HasFactory;

    public function user() : HasOne {
        return $this->hasOne(User::class);
    }

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }
}
