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

    public function author() : HasOne {
        return $this->hasOne(User::class, 'author_id');
    }

    public function user() : HasOne {
        return $this->author();
    }

    public function categories() : BelongsToMany {
        return $this->belongsToMany(Category::class, 'collections');
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

    public function lessons() : HasMany {
        return $this->hasMany(Lesson::class);
    }

    public function students() : BelongsToMany {
        return $this->belongsToMany(User::class, 'enrollments');
    }

    public function reviews() : HasMany {
        return $this->hasMany(Review::class);
    }
}
