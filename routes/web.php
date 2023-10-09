<?php

use App\Http\Controllers\DashboardController;
use App\Livewire\DisplayPage;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'render'])->name('dashboard');
    // Route::get('/display-page', [DisplayPage::class, 'render']
    // )->name('display');
    Route::post('/display-page', [DisplayPage::class, 'store']
    )->name('display');
    Route::get('/display-page', [DisplayPage::class, 'render']
    );
});
