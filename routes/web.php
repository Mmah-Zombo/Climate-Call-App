<?php

use App\Http\Controllers\CommunityComment;
use App\Http\Controllers\DashboardController;
use App\Livewire\Comments;
use App\Livewire\DisplayPage;
use App\Livewire\Posts;
use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');
 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');
 
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
 
    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'render'])->name('dashboard');
    Route::get('/community', function () {
        return view('community');
    }
    )->name('community');
    Route::post('/display-page', [DisplayPage::class, 'store']
    )->name('display');
    Route::get('/display-page', [DisplayPage::class, 'render']
    );
    Route::post('/post', [Posts::class, 'store'])->name('posts');
    Route::post('/update_post/{post_id}', [Posts::class, 'updatePost'])->name('updatePost');

    Route::get('/comments/{post}', [CommunityComment::class, 'show'])->name('comments');
    Route::post('/comment/{post}', [Comments::class, 'store'])->name('addComment');
    Route::post('/update_comment/{comment_id}', [Comments::class, 'updateComment'])->name('updateComment');

    Route::get('/plant-care', function () {
        return view('plant-care');
    }
    )->name('plant-care');
});
