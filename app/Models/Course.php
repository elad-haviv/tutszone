<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;

    public function user() : HasOne {
        return $this->hasOne(User::class);
    }

    public function author() : HasOne {
        return $this->user();
    }

    public function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, 'collections');
    }

    public function lessons() : HasMany {
        return $this->hasMany(Lesson::class);
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class)->wherePivot('lesson_id', null);
    }

    public function allComments() : HasMany {
        return $this->hasMany(Comment::class);
    }

    public function sections() : HasMany {
        return $this->hasMany(Section::class);
    }

    public function students() : BelongsToMany {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function reviews() : HasMany {
        return $this->hasMany(Review::class);
    }
}
