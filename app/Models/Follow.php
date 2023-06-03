<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Follow extends Model
{
    use HasFactory;

    public function followingUser() : HasOne {
        return $this->hasOne(User::class, 'following_id');
    }

    public function followedUser() : HasOne {
        return $this->hasOne(User::class, 'followed_id');
    }
}
