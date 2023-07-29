<?php

/**
 * @author Elad Haviv <elad.haviv@gmail.com>
 */

namespace TutsZone\Http\Controllers\Acp;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!Auth::check()) {
            abort(401, 'Access denied! only admins may access this page.');
        } elseif (Auth::user()->group !== 1) {
            abort(401, 'Access denied! only admins may access this page.');
        }
    }
}
