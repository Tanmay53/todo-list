<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

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
    return redirect()->route('tasks');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // return redirect()->route('tasks');
        return view('dashboard');
    })->name('dashboard');

    Route::get("/tasks", [TaskController::class, 'index'])->name('tasks');
    Route::get("/task/add", [TaskController::class, 'create'])->name('task-create');
    Route::post('/task', [TaskController::class, 'store'])->name('task-store');
    Route::get("/task/edit/{task}", [TaskController::class, 'edit'])->name('task-edit');
    Route::post('/task/{task}', [TaskController::class, 'update'])->name('task-update');
    Route::post('/task/delete/{task}', [TaskController::class, 'destroy'])->name('task-delete');
});
