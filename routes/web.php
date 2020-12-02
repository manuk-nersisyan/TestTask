<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('projects', '\App\Http\Controllers\ProjectController');

Route::post('/add-members/',  [App\Http\Controllers\MemberController::class, 'store'])->name('add-members-store');
Route::delete('/delete-members/{member}',  [App\Http\Controllers\MemberController::class, 'destroy'])->name('delete-members');


Route::get('/task-create/{project}', [App\Http\Controllers\TaskController::class, 'create'])->name('task-create');
Route::post('/task', [App\Http\Controllers\TaskController::class, 'store'])->name('task-store');
Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task-index');
Route::get('/task/{task}', [App\Http\Controllers\TaskController::class, 'show'])->name('task-show');
Route::get('/task/{task}/edit', [App\Http\Controllers\TaskController::class, 'edit'])->name('task-edit');
Route::put('/task/{task}', [App\Http\Controllers\TaskController::class, 'update'])->name('task-update');
Route::delete('/task/{task}', [App\Http\Controllers\TaskController::class, 'destroy'])->name('delete-tasks');

Route::post('/comment', [App\Http\Controllers\CommentController::class, 'store'])->name('comment-store');


