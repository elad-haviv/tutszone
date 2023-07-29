<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showIndex($name)
    {
        $page = Page::where('name', $name)->first();

        if ($page === null) {
            return abort(404);
        }

        return view("page", ["page" => $page]);
    }
}
