<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [DashboardController::class, 'index'])->name('index');

Route::group([ 'prefix' => 'idea/', 'as' =>'idea.', 'middleware' => ['auth'] ], function(){

    // Route::post('/', [IdeaController::class, 'store'])->name('create');
    // Route::get('{idea}', [IdeaController::class, 'show'])->name('show')->withoutMiddleware(['auth']);
    // Route::get('edit/{idea}', [IdeaController::class, 'edit'])->name('edit');
    // Route::put('{idea}', [IdeaController::class, 'update'])->name('update');
    // Route::delete('{idea}', [IdeaController::class, 'destroy'])->name('destroy');
    Route::post('{idea}/comments', [CommentController::class, 'store'])->name('comments.store');

});


Route::post('user/{user}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('user.follow');
Route::post('user/{user}/unfollow', [FollowerController::class, 'unfollow'])->middleware('auth')->name('user.unfollow');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth')->name('profile'); 

Route::resource('idea', IdeaController::class)->except(['index','create', 'show'])->middleware('auth');
Route::resource('idea', IdeaController::class)->only(['show']);
Route::resource('user', UserController::class )->only(['show', 'edit', 'update'])->middleware('auth');












Route::get('/terms', function () {
    return view('terms');
});
