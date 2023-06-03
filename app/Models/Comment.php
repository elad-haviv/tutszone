<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Comment extends Model
{
    use HasFactory;

    public function course() : HasOne {
        return $this->hasOne(Course::class);
    }

    public function lesson() : HasOne {
        return $this->hasOne(Lesson::class);
    }

    public function user() : HasOne {
        return $this->hasOne(User::class);
    }


    public function parent() : HasOne {
        return $this->hasOne(Comment::class, "parent_id");
    }

    public function comments() : HasMany {
        return $this->hasMany(Comment::class, "parent_id");
    }
}
