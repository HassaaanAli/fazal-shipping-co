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
})->name('dashboard');

Route::middleware('auth')->group(function () {

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

     // Company Controller
     Route::resource('/company', App\Http\Controllers\CompanyController::class)->except(['show']);
     Route::get('/company-dt', [App\Http\Controllers\CompanyController::class, 'dataTable'])->name('company-dt');

     // Importer Controller
     Route::resource('/importer', App\Http\Controllers\ImporterController::class)->except(['show']);
     Route::get('/importer-dt', [App\Http\Controllers\ImporterController::class, 'dataTable'])->name('importer-dt');
});

require __DIR__.'/auth.php';
