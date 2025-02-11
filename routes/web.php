<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MeritController;
use App\Http\Controllers\AdminFeeController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminMemberVerification;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MemberDashboardController;
use App\Http\Controllers\AdminUserSettingController;
use App\Http\Controllers\AdminMemberRecordController;
use App\Http\Controllers\MemberUserSettingController;



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


// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
// Logout Route Admin
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');
//Logout Route Member
Route::post('/member/logout', [LoginController::class, 'logout'])->name('member.logout');

// Registration Routes
Route::get('/register', [LoginController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [LoginController::class, 'register']);

// Non-Member Functionality
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
Route::middleware('auth')->prefix('member')->group(function () {
    Route::get('/member/dashboard', [MemberDashboardController::class, 'index'])
    ->name('member.dashboard')
    ->middleware('auth');
    Route::get('/member/dashboard/data', [MemberDashboardController::class, 'getDashboardData'])
    ->name('member.dashboard.data')
    ->middleware('auth');
    Route::get('/fee', function () {
        return view('member.fee'); // Member fee page
    });
    Route::get('/event', function () {
        return view('member.event-list'); // Member event list
    });
    Route::get('/achievement', function () {
        return view('member.achievement-list'); // Member achievement list
    });
   // Settings
   Route::get('/setting', [MemberUserSettingController::class, 'showAccountSettings'])->name('member.setting');
Route::post('/setting', [MemberUserSettingController::class, 'updateAccountDetails'])->name('member.updateAccount');

Route::get('/setting-personal', [MemberUserSettingController::class, 'show'])->name('member.setting-personal');
Route::post('/setting-personal', [MemberUserSettingController::class, 'update']);
    
    ////member event registration
    Route::get('/member/event-registration', function () {
        return view('member.event-registration');
    });
    Route::get('/member/event-registration/{id?}', function() {
        return view('member.event-registration');
    })->name('member.event-registration');
    ////member event registration
    Route::get('/member/fee-receipt', function () {
        return view('member.fee-receipt');
    });
    // Add this route for fee receipt view
    Route::get('/member/fee-receipt/{id?}', function() {
        return view('member.fee-receipt');
    })->name('member.fee-receipt');
});

/////////////////////
// ADMIN FUNCTIONS //
/////////////////////

// ADMIN DASHBOARD
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard')
    ->middleware('auth');

    

   

    // Member Record
    Route::prefix('member-record')->group(function () {
        Route::get('/', [AdminMemberRecordController::class, 'index'])->name('admin.member.record.index');
        Route::get('/view/{id}', [AdminMemberRecordController::class, 'view'])->name('admin.member.record.view');
        //update
        Route::get('/update/{id}', [AdminMemberRecordController::class, 'edit'])
            ->name('admin.member.record.edit');
        Route::put('/update/{id}', [AdminMemberRecordController::class, 'update'])
            ->name('admin.member.record.update');
        //delete
        Route::delete('/delete/{id}', [AdminMemberRecordController::class, 'destroy'])
            ->name('admin.member.record.destroy');
        //report
        Route::get('/member-record/report/{id}', [AdminMemberRecordController::class, 'report'])
            ->name('admin.member.record.report');
        Route::get('/member-record/merit/{id}', [AdminMemberRecordController::class, 'getMeritBySession'])
            ->name('admin.member.record.merit');

        // Route::get('/report', function () {
        //     return view('admin.member-record-report');
        // });
    });

    // Member Verification
    Route::prefix('member-verification')->group(function () {
        // Display list of members for verification
        Route::get('/', [AdminMemberVerification::class, 'index'])->name('admin.member.verification.list');
        
        // Display view of verification member details
        Route::get('/view/{id}', [AdminMemberVerification::class, 'view'])->name('admin.member.verification.view');
        
        // Approve and reject
        Route::post('/approve/{id}', [AdminMemberVerification::class, 'approve'])->name('admin.member.verification.approve');
        Route::post('/reject/{id}', [AdminMemberVerification::class, 'reject'])->name('admin.member.verification.reject');
    });

    // Fee Payment
    Route::prefix('fee-payment')->group(function () {
        // Route::get('/', function () {
        //     return view('admin.fee-payment-list');
        // });
        Route::get('/', [AdminFeeController::class, 'index'])->name('admin.fee-payment.index');
        Route::get('/report/{id}', [AdminFeeController::class, 'report'])->name('admin.fee-payment.report');
        Route::get('/report', function () {
            return view('admin.fee-payment-report');
        });
    });

    // // Fee Collection
    // Route::prefix('fee-collection')->group(function () {
    //     Route::get('/', function () {
    //         return view('admin.fee-collection-list');
    //     });
    //     Route::get('/add', function () {
    //         return view('admin.fee-collection-add');
    //     });
    //     Route::get('/update', function () {
    //         return view('admin.fee-collection-update');
    //     });
    //     Route::get('/report', function () {
    //         return view('admin.fee-collection-report');
    //     });
    // });
    // Fee Collection Routes
    Route::prefix('fee-collection')->group(function () {
        Route::get('/', [AdminFeeController::class, 'feeCollectionList'])->name('admin.fee-collection.list');
        Route::get('/add', [AdminFeeController::class, 'feeCollectionAdd'])->name('admin.fee-collection.add');
        //store
        Route::post('/store', [AdminFeeController::class, 'feeCollectionStore'])->name('admin.fee-collection.store');
        //update
        Route::get('/update', [AdminFeeController::class, 'feeCollectionUpdate'])->name('admin.fee-collection.update');
        Route::get('/edit/{id}', [AdminFeeController::class, 'feeCollectionEdit'])->name('admin.fee-collection.edit');
        Route::put('/update/{id}', [AdminFeeController::class, 'feeCollectionUpdate'])->name('admin.fee-collection.update');
        //delete
        Route::delete('/delete/{id}', [AdminFeeController::class, 'feeCollectionDelete'])
        ->name('admin.fee-collection.delete');
        //report
        Route::get('/report/{id}', [AdminFeeController::class, 'feeCollectionReport'])->name('admin.fee-collection.report');
        
    });

    // Event Record
    Route::prefix('event-record')->group(function () {
        Route::get('/', [AdminEventController::class, 'index'])->name('event.record.index');

        Route::get('/add', function () {
            return view('admin.event-add');
        });
        Route::post('/add', [AdminEventController::class, 'store'])->name('event.record.store');

        // Update routes
        Route::get('/update/{id}', [AdminEventController::class, 'edit'])->name('event.record.edit');
        Route::put('/update/{id}', [AdminEventController::class, 'update'])->name('event.record.update');
        

        // Delete
        Route::delete('/delete/{id}', [AdminEventController::class, 'destroy'])->name('event.record.delete');

        Route::get('/report', function () {
            return view('admin.event-report');
        });
        Route::get('/report/{id}', [AdminEventController::class, 'report'])->name('event.record.report');
        //event volunteer
        Route::get('/admin/event-volunteer', [AdminEventController::class, 'showParticipants'])->name('event.volunteer');


    });

    // Achievement Merit
    Route::prefix('achievement-merit')->group(function () {
        Route::get('/', [MeritController::class, 'index'])->name('merit.list');
        Route::get('/add', [MeritController::class, 'create'])->name('merit.create');
        Route::post('/add', [MeritController::class, 'store'])->name('merit.store');
        Route::get('/update/{id}', [MeritController::class, 'edit'])->name('merit.edit');
        Route::post('/update/{id}', [MeritController::class, 'update'])->name('merit.update');
        Route::delete('/delete/{id}', [MeritController::class, 'destroy'])->name('merit.delete');
    });

    // Merit Allocation Route
    Route::post('/allocate-merit', [AdminEventController::class, 'allocateMerit'])->name('admin.merit.allocate');

    // Achievement Certificate
    Route::prefix('achievement-certificate')->group(function () {
        Route::get('/', function () {
            return view('admin.certificate-list');
        });
        Route::get('/add', function () {
            return view('admin.certificate-add');
        });
        Route::get('/update', function () {
            return view('admin.certificate-update');
        });
    });

       // Settings
       Route::prefix('setting')->group(function () {
        Route::get('/admin', function () {
            return view('admin.setting-admin');
        });

        // User Settings Routes
    Route::prefix('users')->group(function () {
        Route::get('/', [AdminUserSettingController::class, 'index'])
            ->name('admin.setting.users');
        Route::get('/add', [AdminUserSettingController::class, 'add'])
            ->name('admin.setting.users.add');
        Route::post('/store', [AdminUserSettingController::class, 'store']) // This is the route for adding an admin
            ->name('admin.store'); // Ensure this matches the form action
        Route::get('/update/{id}', [AdminUserSettingController::class, 'edit'])
            ->name('admin.setting.users.update');
        Route::put('/update/{id}', [AdminUserSettingController::class, 'update'])
            ->name('admin.setting.users.update.put');
    });
    });
});