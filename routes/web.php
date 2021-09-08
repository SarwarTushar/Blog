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

Route::resource('tag', TagController::class)->name('tag','id');
Route::get('/', 'PostController@index')->name('/');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/create', 'PostController@store')->name('post.store');
Route::get('/post/{id}', 'PostController@show')->name('post.show');

Route::get('/contact', function () {
    return view('frontend.index');
})->name('contact');

//Author wise Post
Route::get('/author/{id}', 'PostController@AuthorWisePost')->name('author_wise_post');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
