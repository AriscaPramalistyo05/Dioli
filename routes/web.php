<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KokiController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\PesanController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;


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

Route::get('/', [HomeController::class, "index"]);
// Route::get('/admin/master', [AdminController::class, 'AdminDashboard'])->name('admin.master');

Route::prefix('admin')->group(function () {

    // Route User
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('/store', [UserController::class, 'store'])->name('admin.user.store');
        Route::post('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.user.delete');
    });

    // Route Koki
    Route::prefix('koki')->group(function () {
        Route::get('/', [KokiController::class, 'index'])->name('admin.koki.index');
        // Route::get('/create', [KokiController::class, 'create'])->name('admin.koki.create');
        Route::post('/store', [KokiController::class, 'store'])->name('admin.koki.store');
        Route::get('/{id}/edit', [KokiController::class, 'edit'])->name('admin.koki.edit');
        Route::put('/{id}/update', [KokiController::class, 'update'])->name('admin.koki.update');
        Route::delete('/{id}/delete', [KokiController::class, 'destroy'])->name('admin.koki.delete');
    });

    // Route Menu 
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('admin.menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('admin.menu.create');
        Route::post('/store', [MenuController::class, 'store'])->name('admin.menu.store');
        Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
        Route::put('/{id}/update', [MenuController::class, 'update'])->name('admin.menu.update');
        Route::delete('/{id}/destroy', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
    });

    // Route Blog 
    Route::prefix('blog')->group(function () {
        Route::get('/', [BlogController::class, 'index'])->name('admin.blog.index');
        Route::get('/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::put('/{id}/update', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::delete('/{id}/destroy', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
    });


});

    // Route Pesan 
    Route::resource('pesan', PesanController::class)->except([
        'store', 'update', 'destroy' // Ini akan di-handle di rute yang spesifik
    ]);
    
    // Rute untuk store, update, dan destroy
    Route::post('pesan', [PesanController::class, 'store'])->name('pesan.store');
    Route::put('pesan/{id}', [PesanController::class, 'update'])->name('pesan.update');
    Route::delete('pesan/{id}', [PesanController::class, 'destroy'])->name('pesan.destroy');
    


// Setting User
// Route::get('/deleteuser/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
// Route::get('/edituser/{id}', [AdminController::class, 'editUser'])->name('edit.user');
// Route::put('/updateuser/{id}', [AdminController::class, 'updateUser'])->name('update.user');
// Route::get('/users', [AdminController::class, "index"])->name('users.index');
// Route::post('/users', [AdminController::class, 'store'])->name('users.store');


Route::get('/redirects', [HomeController::class, 'redirects'])->middleware('auth');

// Show koki di homepage
// Route::get('/homepage', [HomeController::class, 'showKokis'])->name('homepage');

// Rute untuk user
// Route::get('pesan/create', [PesanController::class, 'create'])->name('pesan.create');
// Route::post('pesan', [PesanController::class, 'store'])->name('pesan.store');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route for email verification notice
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Route for email verification handler
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route for resending verification email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


require __DIR__ . '/auth.php';