<?php

use App\Http\Controllers\DivisionController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\Owner\AuthController as OwnerAuthController;
use App\Http\Controllers\DivisionLead\AuthController as DivisionLeadAuthController;
use App\Http\Controllers\Member\AuthController as MemberAuthController;

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
Route::middleware('guest')->prefix('division_lead')->name('division_lead.')->group(function () {
    Route::get('login', [DivisionLeadAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [DivisionLeadAuthController::class, 'login']);
    Route::post('logout', [DivisionLeadAuthController::class, 'logout'])->name('logout');
});
Route::middleware('guest')->prefix('member')->name('member.')->group(function () {
    Route::get('login', [MemberAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [MemberAuthController::class, 'login']);
    Route::post('logout', [MemberAuthController::class, 'logout'])->name('logout');
});


Route::middleware(["auth:division_lead"])->prefix('/division_lead/dashboard')->name('division_lead.')->group(function (){
    Route::get('/', function () {
        return Inertia::render( 'Dashboard/Dashboard');
    })->name('dashboard');

    Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
    Route::get('/division/{division}', [DivisionController::class, 'show'])->name('division.show');
    Route::post('/division', [DivisionController::class, 'store'])->name('division.store');
    Route::put('/division/{division}', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('/division/{division}', [DivisionController::class, 'destroy'])->name('division.destroy');
});

Route::middleware(["auth:owner"])->prefix('/owner/dashboard')->name('owner.')->group(function (){
    Route::get('/', function () {
        return Inertia::render( 'Dashboard/Dashboard');
    })->name('dashboard');

    Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
    Route::get('/division/{division}', [DivisionController::class, 'show'])->name('division.show');
    Route::post('/division', [DivisionController::class, 'store'])->name('division.store');
    Route::put('/division/{division}', [DivisionController::class, 'update'])->name('division.update');
    Route::delete('/division/{division}', [DivisionController::class, 'destroy'])->name('division.destroy');
});

Route::middleware(["auth:member"])->prefix('/member/dashboard')->name('member.')->group(function (){
    Route::get('/', function () {
        return Inertia::render( 'Dashboard/Dashboard');
    })->name('dashboard');
    Route::get('/division', [DivisionController::class, 'index'])->name('division.index');
    Route::get('/division/{division}', [DivisionController::class, 'show'])->name('division.show');
});


