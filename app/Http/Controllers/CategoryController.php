<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $r)
    {
        $categories = Category::whereNull("parent_id")->get();
        return view("categories.list", ["categories" => $categories]);
    }

    public function show(Request $r, Category $category)
    {
        return view("categories.show", [
            "category" => $category,
            "parent" => $category->parent(),
            "courses" => $category->courses(),
            "childCategories" => $category->children()
        ]);
    }
}
