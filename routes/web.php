<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SectionController;

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
//     return view('home');
// });

Route::get('/', [HomeController::class, 'home'])->name('home');


// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('admin.login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::middleware('auth:admin')->group(function () {
        Route::get('/', [BannerController::class, 'index'])->name('admin.dashboard');
        Route::resource('banner', BannerController::class); // For Banner CRUD
        Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');
    });
});

//Route::resource('banner', BannerController::class); // For Banner CRUD

Route::get('admin/dashboard', [AdminController::class, 'index'])->middleware('admin.auth')->name('admin.dashboard');

Route::get('/sections', [SectionController::class, 'index'])->name('sections.index');
Route::post('/sections/overview', [SectionController::class, 'createOverview'])->name('overview.create');
Route::post('/sections/pointer', [SectionController::class, 'createPointer'])->name('pointer.create');
Route::delete('/sections/overview/{id}', [SectionController::class, 'deleteOverview'])->name('overview.delete');
Route::delete('/sections/pointer/{id}', [SectionController::class, 'deletePointer'])->name('pointer.delete');

