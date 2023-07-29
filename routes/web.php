<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {
    /* Home page */
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@showIndex'
    ]);

    /* Content page */
    Route::get('page/{name}', [
        'as' => 'page',
        'uses' => 'PageController@showIndex'
    ]);

    /* Contact page */
    Route::get('/contact', [
        'as' => 'contact',
        'uses' => 'HomeController@getContact'
    ]);
    Route::post('/contact', [
        'as' => 'contact.post',
        'uses' => 'HomeController@postContact'
    ]);

    Route::post('/upload', [
        'as' => 'upload',
        'uses' => 'UploadController@handle'
    ]);

    /* Group for categories */
    Route::group(['prefix' => 'category', 'as' => 'category:'], function () {
        /* Categories list */
        Route::get('/', [
            'as' => 'home',
            'uses' => 'CategoryController@showIndex'
        ]);
        /* Show the content of a single category */
        Route::get('/{name}', [
            'as' => 'show',
            'uses' => 'CategoryController@showCategory'
        ]);
    });

    /* Group for courses */
    Route::group(['prefix' => 'course', 'as' => 'course:'], function () {
        /* Show the course, list all it's tutorials */
        Route::get('/{name}/{lesson?}', [
            'as' => 'show',
            'uses' => 'CourseController@showIndex'
        ]);
        Route::post('comment', [
            'as' => 'comment',
            'uses' => 'CourseController@postComment'
        ]);
    });

    /* Group for member profiles */
    Route::group(['prefix' => 'member', 'as' => 'member:'], function () {
        /* Show a single member profile by the username */
        Route::get('/{name}', [
            'as' => 'show',
            'uses' => 'MemberController@showIndex'
        ]);
    });
});


/* Group for admin control panel*/
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Acp', 'as' => 'admin:'], function () {
    /* Show the home page */
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@showIndex'
    ]);

    /* For each group in the list,
     * create routes for addition, modification and removal of items.
     */
    $groups = ['category', 'member', 'page', 'course', 'lesson'];

    foreach ($groups as $group) {
        $controller = ucfirst($group);
        Route::group(['prefix' => $group, 'as' => $group . ':'], function () use ($controller) {
            Route::get('/', [
                'as' => 'home',
                'uses' => $controller . 'Controller@showIndex'
            ]);
            Route::get('edit/{id}', [
                'as' => 'edit',
                'uses' => $controller . 'Controller@showEdit'
            ]);
            Route::post('edit', [
                'as' => 'post.edit',
                'uses' => $controller . 'Controller@postEdit'
            ]);
            Route::get('add/{data?}', [
                'as' => 'add',
                'uses' => $controller . 'Controller@showAdd'
            ]);
            Route::post('add', [
                'as' => 'post.add',
                'uses' => $controller . 'Controller@postAdd'
            ]);
            Route::get('delete/{id}', [
                'as' => 'delete',
                'uses' => $controller . 'Controller@delete'
            ]);
        });
    }
});

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
