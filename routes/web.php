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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Home Page rout.
 *
 */
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);


/**
 * Categories rout.
 *
 */
Route::prefix('categories')->group(function(){
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index']);

    Route::match(['get', 'post'], '/create', [\App\Http\Controllers\CategoryController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [\App\Http\Controllers\CategoryController::class, 'form']);

    Route::get('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete']);
});

/**
 * Posts rout.
 *
 */
Route::prefix('posts')->group(function () {
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

    Route::match(['get', 'post'], '/create', [\App\Http\Controllers\PostController::class, 'create']);

    Route::match(['get', 'post'], '/update/{id}', [\App\Http\Controllers\PostController::class, 'update']);

    Route::get('/delete/{id}', [\App\Http\Controllers\PostController::class, 'delete']);
});

/**
 * Tags rout.
 *
 */
Route::prefix('tags')->group(function (){
    Route::get('/', [\App\Http\Controllers\TagController::class, 'index']);

    Route::match(['get', 'post'],'/create', [\App\Http\Controllers\TagController::class, 'create']);

    Route::match(['get', 'post'], '/update/{id}', [\App\Http\Controllers\TagController::class, 'update']);

    Route::get('/delete/{id}', [\App\Http\Controllers\TagController::class, 'delete']);
});
