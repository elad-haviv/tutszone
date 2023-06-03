<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lesson extends Model
{
    use HasFactory;

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    public function section() : BelongsTo {
        return $this->belongsTo(Section::class);
    }

    public function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, 'collections');
    }

    public function cempleted() : BelongsToMany {
        return $this->belongsToMany(User::class, 'completions');
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class);
    }
}
