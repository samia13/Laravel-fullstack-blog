<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


// frontend pages 
Route::get('/', 'PageController@index')->name('home');
Route::get('/posts', 'PageController@posts')->name('posts');
Route::get('/posts/{post}', 'PageController@showPost')->name('posts.view');
Route::get('/category/{category}', 'PageController@showCategory')->name('categories.view');

// admin pages 
Route::group(['prefix' => '/admin', 'middleware' => 'auth'], function () {
    Route::resource('posts','PostController');
    Route::resource('categories','CategoryController')->except('show');
});