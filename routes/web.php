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
////////////////////////
// NON MEMBER FUNCTION//
////////////////////////
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

////////////////////
// MEMBER FUNCTION//
////////////////////
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

//member event registration
Route::get('/member/event-registration', function () {
    return view('member.event-registration');
});
///////////////////
// ADMIN FUNCTION//
///////////////////
//admin dashboard
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// MEMBER RECORD
//admin - member record-list
Route::get('/admin/member-record', function () {
    return view('admin.member-record-list');
});
//admin - member record-view
Route::get('/admin/member-record/view', function () {
    return view('admin.member-record-view');
});
//admin - member record-update
Route::get('/admin/member-record/update', function () {
    return view('admin.member-record-update');
});
//admin - member record-report
Route::get('/admin/member-record/report', function () {
    return view('admin.member-record-report');
});

// MEMBER VERIFICATION
//admin - member verification
Route::get('/admin/member-verification', function () {
    return view('admin.member-verification-list');
});
//admin - member verification-view
Route::get('/admin/member-verification/view', function () {
    return view('admin.member-verification-view');
});

// FEE PAYMENT
//admin - fee payment
Route::get('/admin/fee-payment', function () {
    return view('admin.fee-payment-list');
});
//admin - fee payment-report
Route::get('/admin/fee-payment/report', function () {
    return view('admin.fee-payment-report');
});

// FEE COLLECTION
//admin - fee collection
Route::get('/admin/fee-collection', function () {
    return view('admin.fee-collection-list');
});
//admin - fee collection-add
Route::get('/admin/fee-collection/add', function () {
    return view('admin.fee-collection-add');
});
//admin - fee collection-update
Route::get('/admin/fee-collection/update', function () {
    return view('admin.fee-collection-update');
});
//admin - fee collection-report
Route::get('/admin/fee-collection/report', function () {
    return view('admin.fee-collection-report');
});

//EVENT RECORD
//admin - event record
Route::get('/admin/event-record', function () {
    return view('admin.event-list');
});
//admin - event record-add
Route::get('/admin/event-record/add', function () {
    return view('admin.event-add');
});
//admin - event record-update
Route::get('/admin/event-record/update', function () {
    return view('admin.event-update');
});
//admin - event record-report
Route::get('/admin/event-record/report', function () {
    return view('admin.event-report');
});

//EVENT VOLUNTEER
//admin - event volunteer
Route::get('/admin/event-volunteer', function () {
    return view('admin.event-volunteer');
});

// ACHIEVEMENT MERIT
//admin - achievement merit
Route::get('/admin/achievement-merit', function () {
    return view('admin.merit-list');
});
//admin - achievement merit-add
Route::get('/admin/achievement-merit/add', function () {
    return view('admin.merit-add');
});
//admin - achievement merit-update
Route::get('/admin/achievement-merit/update', function () {
    return view('admin.merit-update');
});

// ACHIEVEMENT CERTIFICATE
//admin - achievement certificate
Route::get('/admin/achievement-certificate', function () {
    return view('admin.certificate-list');
});
//admin - achievement certificate-add
Route::get('/admin/achievement-certificate/add', function () {
    return view('admin.certificate-add');
});
//admin - achievement certificate-update
Route::get('/admin/achievement-certificate/update', function () {
    return view('admin.certificate-update');
});

//SETTING ADMIN
//admin - setting admin
Route::get('/admin/setting-admin', function () {
    return view('admin.setting-admin');
});

//SETTING USERS
//admin - setting user
Route::get('/admin/setting-users', function () {
    return view('admin.setting-user-list');
});
//admin - setting user-add
Route::get('/admin/setting-users/add', function () {
    return view('admin.setting-user-add');
});
//admin - setting user-update
Route::get('/admin/setting-users/update', function () {
    return view('admin.setting-user-update');
});
