<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
Route::delete('/users/{user_id}/comments/{id}', [CommentController::class, 'delete'])->name('comments.delete');
Route::get('/users/{id}/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::put('comments/{id}', [CommentController::class, 'update'])->name('comments.update');
Route::get('/users/{user_id}/comments/{id}', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/users/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/users/{id}/comments', [CommentController::class, 'index'])->name('comments.index');

Route::delete('/users/{id}', [UserController::class, 'delete'])->name('users.delete');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';