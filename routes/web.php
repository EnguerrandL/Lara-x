<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
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




Route::post('/idea', [IdeaController::class, 'store'])->name('idea.create')->middleware('auth');
Route::get('/idea/{idea}', [IdeaController::class, 'show'])->name('idea.show');
Route::get('/idea/edit/{idea}', [IdeaController::class, 'edit'])->name('idea.edit')->middleware('auth');
Route::put('/idea/{idea}', [IdeaController::class, 'update'])->name('idea.update')->middleware('auth');
Route::delete('/idea/{idea}', [IdeaController::class, 'delete'])->name('idea.destroy')->middleware('auth');



Route::post('/idea/{idea}/comments', [CommentController::class, 'store'])->name('idea.comments.store')->middleware('auth');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');






Route::get('/terms', function () {
    return view('terms');
});
