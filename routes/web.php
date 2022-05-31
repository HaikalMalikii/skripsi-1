<?php

use Illuminate\Support\Facades\Auth;
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

///Route Aduan
Route::get('/AddAduan', function () {
    return view('Aduan.AddAduan');
});
Route::post('/AddAduan','AduanController@AddAduan');


////

///Route Role
Route::get('/users', 'UsersController@index');
Route::get('/punya_gue', 'PunyaGueController@dashboard');
Route::get('/admin_instansi_umum', 'AdminInstansiUmum@dashboard');
Route::get('/admin_kelurahan', 'AdminKelurahanController@dashboard');

Route::get('/Admin.dashboard', function () {
    return view('Admin.dashboard');
});
///
Route::get('/forum','ForumController@index');

Route::get('/ForumDetail/{id}','ForumController@ForumDetail');
Route::get('/posts.add','ForumController@index');
Route::get('/addforum', function () {
    return view('Forum.addforum');
});
Route::post('/save-comment/{slug}/{id}','ForumController@ForumDetailComment');
Route::get('/ForumDetailComment','ForumController@IndexComments');

Route::post('/AddnewForum','ForumController@AddForum');

// Route::get('/addforum','ForumController@GetUserID');
