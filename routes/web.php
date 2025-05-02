<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SongController;
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
    return view('accueil');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

   
    Route::resource("orders",OrderController::class);
   

    // Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    // Route::get('/admin/albums', [AdminController::class, 'manageAlbums'])->name('admin.albums');
    // Route::get('/admin/orders', [AdminController::class, 'manageOrders'])->name('admin.orders');
    // Route::get('/admin/albums/list', [AlbumController::class, 'list'])->name('admin.album.list');
});

Route::middleware(['auth','admin'])->prefix('admin')->group(function(){
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::resource("albums",AlbumController::class);
    Route::resource("songs", SongController::class);
});

require __DIR__.'/auth.php';
