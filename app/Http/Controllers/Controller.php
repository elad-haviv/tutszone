<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $showPages = false;
        if (Auth::check()) {
            if (Auth::user()->group == 1) {
                $showPages = true;
                $pages = Page::all();
            }
        }
        if (!isset($pages)) {
            $q = Page::where('show', '1');
            $pages = $q->get();
            $showPages = $q->count() > 0;
        }
        View::share('pages', $pages);
        View::share('showPages', $showPages);

        $partners = [
            // ["name" => "עמוד לדוגמא", "url" => "http://www.google.com"],
        ];
        View::share('partners', $partners);
    }
}
