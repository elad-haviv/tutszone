<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'collections');
    }

    public static function getTopLevel()
    {
        return Category::where("parent_id", "=", null)->get();
    }

    public static function getRecursiveCategoryList($parent = 0, $level = 0)
    {
        $list = [];
        $cats = self::select('id', 'title')->where('parent', $parent);
        if ($cats->count() !== 0) {
            foreach ($cats->get() as $cat) {
                $list[] = [
                    'name' => $cat->title,
                    'id' => $cat->id,
                    'level' => $level
                ];
                $list = array_merge($list, self::getRecursiveCategoryList($cat->id, $level + 1));
            }
        }
        return $list;
    }
}
