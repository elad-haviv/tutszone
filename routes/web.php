<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(CategoryController::class)->group(function () {
    Route::get('/category', 'index')->name('categories');
    Route::get('/category/{category:slug}', 'show')->name('category');
});

Route::controller(CourseController::class)->group(function () {
    Route::get('/courses', 'index')->name('courses');
    Route::get('/course/{course:slug}', 'show')->name('course');
    Route::get('/course/{course:slug}/{lesson:slug}', 'show')->name('lesson');
});

Route::controller(PageController::class)->group(function () {
    Route::get('/page/{page:slug}', 'index')->name('page');
});

Route::controller(User::class)->group(function () {
    Route::get('/profile/{user:id?}', 'index')->name('profile');
});

