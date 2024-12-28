<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminEventController;

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

////member event registration
Route::get('/member/event-registration', function () {
    return view('member.event-registration');
});
///////////////////
// ADMIN FUNCTIONS //
/////////////////////

// ADMIN DASHBOARD
Route::prefix('admin')->group(function () {

    // Dashboard
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // MEMBER RECORD
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

    // MEMBER VERIFICATION
    Route::prefix('member-verification')->group(function () {
        Route::get('/', function () {
            return view('admin.member-verification-list');
        });
        Route::get('/view', function () {
            return view('admin.member-verification-view');
        });
    });

    // FEE PAYMENT
    Route::prefix('fee-payment')->group(function () {
        Route::get('/', function () {
            return view('admin.fee-payment-list');
        });
        Route::get('/report', function () {
            return view('admin.fee-payment-report');
        });
    });

    // FEE COLLECTION
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

   // EVENT RECORD
    Route::prefix('event-record')->group(function () {
        Route::get('/', [AdminEventController::class, 'index'])->name('event.record.index');
        Route::get('/add', function () {
            return view('admin.event-add');
        });
        Route::post('/add', [AdminEventController::class, 'store'])->name('event.record.store');
        
        // Update routes
        Route::get('/update/{id}', [AdminEventController::class, 'edit'])->name('event.record.edit');
        Route::post('/update/{id}', [AdminEventController::class, 'update'])->name('event.record.update');

        //Delete
         // Delete route
        Route::delete('/delete/{id}', [AdminEventController::class, 'destroy'])->name('event.record.delete');

        Route::get('/report', function () {
            return view('admin.event-report');
        });
        Route::get('/report/{id}', [AdminEventController::class, 'report'])->name('event.record.report');
    });

    // EVENT VOLUNTEER
    Route::get('/event-volunteer', function () {
        return view('admin.event-volunteer');
    });

    // ACHIEVEMENT MERIT
    Route::prefix('achievement-merit')->group(function () {
        Route::get('/', function () {
            return view('admin.merit-list');
        });
        Route::get('/add', function () {
            return view('admin.merit-add');
        });
        Route::get('/update', function () {
            return view('admin.merit-update');
        });
    });

    // ACHIEVEMENT CERTIFICATE
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

    // SETTINGS
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
