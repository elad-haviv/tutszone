<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
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

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Content Pages
Route::get('/page/{page:slug}', [PageController::class, 'index'])->name('page');

Route::controller(PageController::class)->prefix('page')->group(function () {
    Route::get('/{page:slug', 'index');
});

// Contact
Route::prefix('contact')->group(function () {
    Route::get('/', [HomeController::class, 'getContact'])->name('get');
});

// Category

Route::prefix('category')->group(function () {
    Route::get("/", [CategoryController::class, "index"])->name("home");
    Route::get("/{category:slug}", [CategoryController::class, "show"])->name("show");
})->name("category:");


// User Authentication Routes

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
