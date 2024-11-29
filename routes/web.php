<?php

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
// Route::get('/', function () {
//     return view('welcome');
// });

// NON MEMBER FUNCTION
Route::get('/', function () {
    return view('non-member.home');
});
Route::get('/about', function () {
    return view('non-member.about');
});
Route::get('/blog', function () {
    return view('non-member.blog');
});
Route::get('/portfolio', function () {
    return view('non-member.portfolio');
});
Route::get('/contact', function () {
    return view('non-member.contact');
});


// MEMBER FUNCTION
//member dashboard
Route::get('/member/dashboard', function () {
    return view('member.dashboard');
});

//member fee
Route::get('/member/fee', function () {
    return view('member.fee');
});

//member event
Route::get('/member/event', function () {
    return view('member.event-list');
});

//member achievement
Route::get('/member/achievement', function () {
    return view('member.achievement-list');
});

//member setting
Route::get('/member/setting', function () {
    return view('member.setting-account');
});


// ADMIN FUNCTION
//admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});
