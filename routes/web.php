<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController; 
use App\Http\Livewire\Admin\Users\ListUsers;
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

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::get('users', ListUsers::class)->name('users.index');
    Route::get('faculties', \App\Http\Livewire\Admin\FacultiesComponent::class)->name('faculties.index');
    Route::resource('products', ProductController::class);
});
