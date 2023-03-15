<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->group(function () {

        // Dashboard routes
        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('dashboard.index');

        // Category routes    
        Route::get('category', [CategoryController::class, 'index'])
            ->name('category.index');

        Route::post('category', [CategoryController::class, 'store'])
            ->name('category.create');

        Route::get('category/{category}/edit', [CategoryController::class, 'edit'])
            ->name('category.edit');

        Route::put('category/{category}', [CategoryController::class, 'update'])
            ->name('category.update');

});

// Route::prefix('admin')->group(function () {
//     Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// });

require __DIR__.'/auth.php';
