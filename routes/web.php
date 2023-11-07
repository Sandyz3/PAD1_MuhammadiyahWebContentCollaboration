<?php

use App\Http\Controllers\loginregis;
use App\Http\Controllers\AuthController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/homepage', function () {
//     return view('user/homepage');
// });
// Route::get('/sign_in', function () {
//     return view('user/sign_in');
// });
// Route::get('/sign_up', function () {
//     return view('user/sign_up');
// });
// Route::get('/index', function () {
//     return view('user/index');
// });
// Route::get('/kajian', function () {
//     return view('user/kajian');
// });
// Route::get('/kajian', function () {
//     return view('user/kajian');
// });
// Route::get('/about', function () {
//     return view('user/about');
// });
// Route::get('/about', function () {
//     return view('user/about');
// });
// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// });
// Route::get('/data_kajian', function () {
//     return view('admin/data_kajian');
// });
// Route::get('/data_user', function () {
//     return view('admin/data_user');
// });
// Route::get('/history_login', function () {
//     return view('admin/history_login');
// });
// Route::get('/history_download', function () {
//     return view('admin/history_download');
// });
// Route::get('/history_upload', function () {
//     return view('admin/history_upload');
// });


Route::controller(loginregis::class)->group(function () {
    Route::get('/sign_up', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/sign_in', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('auth');
    Route::get('/homepage', 'homepage')->name('homepage');
    Route::post('/logout', 'logout')->name('logout');
});


// Route::get('/sign_up', function () {
//     return view('sign_up', [
//     ]);
// });

// Route::get('/homepage', [WCCController::class, 'homepage']);



// Route::get('/beranda', 'AuthController@beranda')->name('beranda');
// Route::get('/register', 'AuthController@showRegistrationForm');
// Route::post('/register', 'AuthController@register');
// Route::get('/login', 'AuthController@showLoginForm')->name('login');
// Route::post('/login', 'AuthController@login');
// Route::post('/logout', 'AuthController@logout');


// Route::controller(AuthController::class)->group(function () {
//     Route::get('/beranda', 'AuthController@beranda')->name('beranda');
//     Route::get('/register', 'AuthController@showRegistrationForm');
//     Route::post('/register', 'AuthController@register');
//     Route::get('/login', 'AuthController@showLoginForm')->name('login');
//     Route::post('/login', 'AuthController@login');
//     Route::post('/logout', 'AuthController@logout');
// });

// Route::middleware(['web'])->group(function () {
//     Route::get('/sign_up', [loginregis::class, 'register'])->name('register');
//     Route::post('/store', [loginregis::class, 'store'])->name('store');
//     Route::get('/sign_in', [loginregis::class, 'login'])->name('login');
//     Route::post('/authenticate', [loginregis::class, 'authenticate'])->name('auth');
//     Route::get('/homepage', [loginregis::class, 'homepage'])->name('homepage');
//     Route::post('/logout', [loginregis::class, 'logout'])->name('logout');

// });
