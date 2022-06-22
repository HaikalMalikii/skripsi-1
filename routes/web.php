<?php

use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', 'HomeController@view')->name('home');
// Route::get('/',[HomeController::class,'view']);




Route::get('/', 'HomeController@index');

Auth::routes();

Route::get('user/login', 'Auth\AdminAuthController@getLogin')->name('user.login');
Route::post('user/login', 'Auth\AdminAuthController@postLogin');


Route::get('/', 'HomeController@index')->name('home');

///Route Aduan
Route::get('/AddAduan', function () {
    return view('Aduan.AddAduan');
});
Route::post('/AddAduan', 'AduanController@AddAduan');


////cek

///Route Role
Route::get('/users', 'UsersController@index');


Route::get('/punya_gue', 'PunyaGueController@dashboard');
Route::get('/admin_instansi_umum', 'AdminInstansiUmum@dashboardAdminInstansi');


Route::get('/Admin.dashboard', function () {
    return view('Admin.dashboard');
});

Route::get('/Admin.dashboardAdminInstansi', function () {
    return view('Admin.dashboardAdminInstansi');
});

// Admin Kelurahan
Route::get('/admin_kelurahan', 'AdminKelurahanController@dashboardAdminKelurahan');
Route::get('/Admin.dashboardAdminKelurahan', function () {
    return view('Admin.dashboardAdminKelurahan');
});

Route::get('/detail-berita', 'BeritaController@detailBerita');

Route::get('/admin-berita', 'AdminKelurahanController@berita');
Route::post('/admin-add-berita', 'AdminKelurahanController@addBerita');
Route::post('/admin-edit-berita/{berita_id}', 'AdminKelurahanController@editBerita');
Route::get('/admin-delete-berita/{berita_id}', 'AdminKelurahanController@deleteBerita');


Route::get('/admin-forum', 'ForumController@index');

///Login Google
Route::get('/auth/redirect', 'Auth\LoginController@redirectToProvider');
Route::get('/auth/callback', 'Auth\LoginController@handleProviderCallback');
/// Aduan 
Route::get('/Aduan','AduanController@view');
Route::get('/AduanDetail/{id}', 'AduanController@AduanDetail');

/// Forum
Route::get('/forum', 'ForumController@index');
Route::get('/ForumDetail/{id}', 'ForumController@ForumDetail');
Route::get('/posts.add', 'ForumController@index');
Route::get('/addforum', function () {
    return view('Forum.addforum');
});
Route::post('/save-comment/{slug}/{id}', 'ForumController@ForumDetailComment');
Route::get('/ForumDetailComment', 'ForumController@IndexComments');

Route::post('/AddnewForum', 'ForumController@AddForum');

// Route::get('/addforum','ForumController@GetUserID');