<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Auth;
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


Route::get('/tareas', function () {
    return view('tareas');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/tasks', [TaskController::class ,'index']);
Route::post('/tasks',[ TaskController::class ,'store'])->name('tasks.store');
Route::get('/tasks/edit/{id}', [TaskController::class ,'editView'])->name('tasks.edit_view');
Route::post('/tasks/{id}', [TaskController::class ,'edit'])->name('tasks.edit');
Route::delete('/tasks/{id}',[ TaskController::class ,'destroy'])->name('tasks.destroy');