<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Owner\AuthController as OwnerAuthController;

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

Route::middleware('guest')->prefix('owner')->name('owner.')->group(function () {
    Route::get('login', [OwnerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [OwnerAuthController::class, 'login']);
    Route::post('logout', [OwnerAuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth'])->prefix('/dashboard')->group(function (){
    Route::get('/', function () {
        return Inertia::render( 'Dashboard/Dashboard');
    })->name('dashboard');
});

