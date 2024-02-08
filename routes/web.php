<?php

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
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
        // Profile
        Route::get('/', [App\Http\Controllers\Profile\ProfileController::class, 'index'])->name('index');
        Route::post('/', [App\Http\Controllers\Profile\ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [App\Http\Controllers\Profile\ProfileController::class, 'update'])->name('update');

        // update password
        Route::post('/password', [App\Http\Controllers\Profile\UpdatePasswordController::class, 'edit'])->name('password.edit');
        Route::put('/password', [App\Http\Controllers\Profile\UpdatePasswordController::class, 'update'])->name('password.update');

        // avatar
        Route::post('/avatar', [App\Http\Controllers\Profile\AvatarController::class, 'edit'])->name('avatar.edit');
        Route::put('/avatar', [App\Http\Controllers\Profile\AvatarController::class, 'update'])->name('avatar.update');
    });

     // Setting Controller
     Route::resource('settings', App\Http\Controllers\SettingController::class)->only(['store']);
});

require __DIR__.'/auth.php';
