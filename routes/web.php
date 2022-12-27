<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TablesController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\QrController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Route::get('/dashboard', function () {
//     return Inertia::render('Dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard',[ DashboardController::class,'index'])->name('dashboard');

    //tables
    Route::get('tables',[TablesController::class,'index'])->name('tables.index');
    Route::put('tables/add',[TablesController::class,'add'])->name('tables.add');
    Route::put('tables/{id}',[TablesController::class,'edit'])->name('tables.edit');
    Route::delete('tables/delete/{id}',[TablesController::class,'delete'])->name('tables.delete');
    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //requests
    Route::get('requests',[RequestsController::class,'index'])->name('request.index');
    Route::put('requests/add',[RequestsController::class,'add'])->name('request.add');
    Route::put('requests/done/{id}',[RequestsController::class,'done'])->name('request.done');
    Route::put('requests/cancele/{id}',[RequestsController::class,'cancele'])->name('request.cancele');
    Route::get('requests/search',[RequestsController::class,'search'])->name('request.search');
    Route::get('requests/send-email/{id}',[RequestsController::class,'sendEmail'])->name('request.email');
    //qr
    Route::get('/qr', [QrController::class, 'index'])->name('qr.index');

});
// allow guest users to request
 Route::put('requests/add',[RequestsController::class,'add'])->name('request.add');
 Route::get('requests/live-update/{id}',[RequestsController::class,'live'])->name('request.live');
 Route::get('requests/live-update/confirm/{id}',[RequestsController::class,'confirm'])->name('request.confirmView');
 Route::put('requests/live-update/confirm/{id}',[RequestsController::class,'confirmRequest'])->name('request.confirmRequest');

 

require __DIR__.'/auth.php';
