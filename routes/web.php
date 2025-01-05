<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MeritController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminMemberVerification;


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
// Logout Route
Route::post('/admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

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
    Route::get('/member/dashboard', function () {
        return view('member.dashboard');
    })->name('member.dashboard')->middleware('auth');
    Route::get('/fee', function () {
        return view('member.fee'); // Member fee page
    });
    Route::get('/event', function () {
        return view('member.event-list'); // Member event list
    });
    Route::get('/achievement', function () {
        return view('member.achievement-list'); // Member achievement list
    });
    Route::get('/setting', function () {
        return view('member.setting-account'); // Member account settings
    });
});

/////////////////////
// ADMIN FUNCTIONS //
/////////////////////

// ADMIN DASHBOARD
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard')->middleware('auth');

    // Create Admin
    Route::get('/create-admin', [AdminController::class, 'showCreateAdminForm'])->name('admin.create');
    Route::post('/create-admin', [AdminController::class, 'store'])->name('admin.store');

    // Member Record
    Route::prefix('member-record')->group(function () {
        Route::get('/', function () {
            return view('admin.member-record-list');
        });
        Route::get('/view', function () {
            return view('admin.member-record-view');
        });
        Route::get('/update', function () {
            return view('admin.member-record-update');
        });
        Route::get('/report', function () {
            return view('admin.member-record-report');
        });
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
        Route::get('/', function () {
            return view('admin.fee-payment-list');
        });
        Route::get('/report', function () {
            return view('admin.fee-payment-report');
        });
    });

    // Fee Collection
    Route::prefix('fee-collection')->group(function () {
        Route::get('/', function () {
            return view('admin.fee-collection-list');
        });
        Route::get('/add', function () {
            return view('admin.fee-collection-add');
        });
        Route::get('/update', function () {
            return view('admin.fee-collection-update');
        });
        Route::get('/report', function () {
            return view('admin.fee-collection-report');
        });
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
        Route::post('/update/{id}', [AdminEventController::class, 'update'])->name('event.record.update');

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
        Route::post('/allocate', [AdminEventController::class, 'allocateMerit'])->name('merit.allocate');
    });

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

        Route::prefix('users')->group(function () {
            Route::get('/', function () {
                return view('admin.setting-user-list');
            });
            Route::get('/add', function () {
                return view('admin.setting-user-add');
            });
            Route::get('/update', function () {
                return view('admin.setting-user-update');
            });
        });
    });
});




 



    