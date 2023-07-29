<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function showIndex()
    {
        $categories = Category::where('parent', 0)->paginate(12);
        return view("categories.list", ["categories" => $categories]);
    }

    public function showCategory($name, $page = 1)
    {
        $category = Category::where('name', $name)->first();
        if ($category === null) {
            return abort(404);
        }

        $subCategories = Category::select('id', 'name', 'title', 'description', 'picture')->where('parent', $category->id)->get();
        $parent = Category::select('name', 'title')->where('id', $category->parent)->first();

        $courses = Course::where('category', $category->id)->orderBy('order', 'ASC')->paginate(12);

        return view('categories.show', [
            "category" => $category,
            "subCategories" => $subCategories,
            "parent" => $parent,
            "courses" => $courses
        ]);
    }
}
