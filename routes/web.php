<?php

use App\Http\Controllers\Admin\BaseController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\KamarController;
use App\Http\Controllers\Admin\LikesController;
use App\Http\Controllers\Admin\RatingsController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SewaKamarController;
use App\Http\Controllers\Admin\NotifikasiController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\LandingController;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


// ini untuk yang belum login
Route::controller(LandingController::class)->group(function(){
    Route::get('/', 'index')->name('landing.home');
    Route::get('/about', 'about')->name('landing.about');
    Route::get('/rooms', 'rooms')->name('landing.rooms');
    Route::get('/detail', 'detail')->name('landing.detail');
    Route::get('/search', 'search')->name('landing.search');
});

Route::middleware('auth')->group(function(){
    Route::controller(LikesController::class)->group(function(){
        Route::post('/like', 'like')->name('like');
        Route::post('/unlike', 'unlike')->name('unlike');
        Route::get('/user/liked', 'indexlike')->name('user.liked');
    });

    Route::controller(SewaKamarController::class)->group( function(){
        Route::get('/kamar-sewa/{kamar_id}', 'sewa')->name('sewa.index.auth');
        Route::get('/kamar-komen/{kamar_id}', 'komen')->name('komen.index.auth');
        Route::get('/kamar-komplen/{kamar_id}', 'komplen')->name('komplen.index.auth');
        Route::post('/create/kamar-sewa', 'create')->name('create.auth.sewa');
    });

    Route::controller(ComplaintController::class)->group( function(){
        Route::get('/complaint/get', 'tambah')->name('complaint.auth.tambah');
        Route::post('/complaint/post', 'create')->name('complaint.auth.create');
    });

    Route::controller(ReviewController::class)->group(function(){
        Route::get('/review/get', 'tambah')->name('review.auth.tambah');
        Route::post('/review/post', 'create')->name('review.auth.create');
    });
    Route::controller(ChartController::class)->group(function(){
        Route::get('/chart-blog', 'chart')->name('chart.blog');
    });
    Route::controller(NotifikasiController::class)->group(function(){
        Route::post('/notifications/{id}/read', 'markAsRead')->name('notifications.read');
    });
});


Route::post('/rate', [RatingsController::class, 'rate'])->name('rate');

Route::post('/confirm-booking/{id}', [SewaKamarController::class, 'confirmBooking']);


// route untuk admin

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){
    Route::controller(BaseController::class)->group(function(){
        Route::get('/home', 'index')->name('index.home');
        Route::get('/data-user', 'dataUser')->name('data.user');
        Route::get('/data-admin', 'dataAdmin')->name('data.admin');
        Route::delete('/data-user/delete', 'deleteUser')->name('data.delete.user');
        Route::delete('/delete-admin', 'deleteAdmin')->name('delete.admin');
        Route::post('/data-admin/create', 'createAdmin')->name('create.admin');
        Route::post('/search', 'search')->name('user.search');
    });

    Route::controller(KamarController::class)->group(function(){
        Route::get('/data-kamar', 'index')->name('index.kamar');
        Route::get('/kamar/detail', 'detail')->name('detail.kamar');
        Route::get('/kamar/tambah', 'tambah')->name('tambah.kamar');
        Route::post('/kamar/create', 'create')->name('created.kamar');
        Route::get('/form-kamar/edit/{id}',  'edit')->name('edit.kamar');
        Route::put('/form-kamar/update/{id}',  'update')->name('update.kamar');
        Route::delete('/kamar/delete', 'delete')->name('delete.kamar');
    });

    Route::controller(SewaKamarController::class)->group( function(){
        Route::get('/sewa-kamar', 'index')->name('index.sewa');
        Route::get('/sewa-kamar/{kamar_id}', 'sewa')->name('sewa.index');
        Route::post('/create/sewa-kamar', 'create')->name('create.sewa');
        Route::get('/edit/sewa-kamar/{id}', 'edit')->name('edit.sewa');
        Route::post('/update/sewa-kamar/{id}', 'update')->name('update.sewa');
        Route::get('/detail/sewa-kamar', 'detail')->name('detail.sewa');

    });

    Route::controller(ComplaintController::class)->group( function(){
        Route::get('/complaint', 'index')->name('index.complaint');
        Route::get('/complaint/get', 'tambah')->name('complaint.tambah');
        Route::post('/complaint/post', 'create')->name('complaint.create');
        Route::delete('/complaint/delete', 'delete')->name('complaint.delete');
    });

    Route::controller(LikesController::class)->group(function(){
        Route::get('/like-post', 'index')->name('index.like');
    });

    Route::controller(ReviewController::class)->group(function(){
        Route::get('/review-post', 'index')->name('index.review');
        Route::get('/review/get', 'tambah')->name('review.tambah');
        Route::post('/review/post', 'create')->name('review.create');
        Route::delete('/review/delete', 'delete')->name('review.delete');
    });

    Route::controller(RatingsController::class)->group(function(){
        Route::get('/rating-post', 'index')->name('index.rating');
    });


});