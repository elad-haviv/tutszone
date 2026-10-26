<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function showIndex($name)
    {
        $member = User::where('name', $name)->first();

        if ($member === null) {
            return abort(404);
        }

        return view('user-profile', ['member' => $member]);
    }
}
