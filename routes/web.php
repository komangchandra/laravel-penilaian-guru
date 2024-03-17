<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

// Route untuk dashboard/guru
Route::controller(TeacherController::class)->group(function(){
    Route::get('/dashboard/teachers', 'index')->name('teachers.index');
    Route::get('/dashboard/teachers/create', 'create')->name('teachers.create');
    Route::post('/dashboard/teachers', 'store')->name('teachers.store');
    Route::delete('/dashboard/teachers/{teacher}', 'destroy')->name('teachers.destroy');
});