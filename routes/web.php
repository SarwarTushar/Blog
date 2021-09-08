<?php

use Illuminate\Support\Facades\Route;

//tag
Route::resource('tag', TagController::class)->name('tag','id');

//post
Route::get('/', 'PostController@index')->name('/');
Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/create', 'PostController@store')->name('post.store');
Route::get('/post/{id}', 'PostController@show')->name('post.show');

//contact
Route::get('/contact', function () {
    return view('frontend.index');
})->name('contact');

//Author wise Post
Route::get('/author/{id}', 'PostController@AuthorWisePost')->name('author_wise_post');

//mypost
Route::resource('mypost', MyPostController::class)->name('mypost','id');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
