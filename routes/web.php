<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Models\Category;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])
        ->name('category.list')
        ->can('viewAny', [Category::class]);
    Route::get('/{category:slug}', [CategoryController::class, 'show'])
        ->name('category.show')
        ->middleware('can:view,category');

    Route::middleware('can:create,category')->group(function () {
        Route::get('/create', [CategoryController::class, 'category.new']);
        Route::post('/create', [CategoryController::class, 'category.create']);
    });

    Route::middleware('can:update,category')->group(function () {
        Route::get('/edit/{category:slug}', [CategoryController::class, 'category.edit']);
        Route::post('/edit/{category:slug}', [CategoryController::class, 'category.update']);
    });

    Route::middleware('can:delete,category')->group(function () {
        Route::get('/delete/{category:slug}', [CategoryController::class, 'category.edit']);
        Route::post('/edit/{category:slug}', [CategoryController::class, 'category.update']);
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
