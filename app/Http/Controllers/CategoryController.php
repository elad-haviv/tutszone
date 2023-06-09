<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $r) {
        $categories = Category::whereNull("parent_id")->get();
        $res = "List of Categories: <br />";
        foreach ($categories as $category) {
            $res .= "<a href='". route('category', ['category' => $category]) ."'>{$category->title}</a> <br />";
        }
        return $res;
    }

    public function show(Request $r, Category $category) {
        return "Category: {$category->title}.";
    }
}
