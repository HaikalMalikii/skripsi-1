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
    return view('home');
});

Route::get('/Show', function () {
    return view('page.homepage');
});



Auth::routes();

Route::get('user/login', 'Auth\AdminAuthController@getLogin')->name('user.login');
Route::post('user/login', 'Auth\AdminAuthController@postLogin');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/forum','ForumController@index');
Route::get('/posts.add','ForumController@index');
Route::get('/addforum', function () {
    return view('Forum.addforum');
});


Route::post('/AddnewForum','ForumController@AddForum');

// Route::get('/addforum','ForumController@GetUserID');
