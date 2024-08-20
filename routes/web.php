<?php

use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('admin.')->prefix('/admin/')->group(function(){
    Route::get('projects/delete', [AdminProjectController::class, 'softDeleted'])->name('projects.deleted');
    Route::resource('projects', AdminProjectController::class);
    Route::patch('projects/{id}/restore', [AdminProjectController::class, 'restore'])->name('projects.restore');
    Route::delete('projects/{id}/hardDelete', [AdminProjectController::class, 'hardDelete'])->name('projects.hardDelete');
    Route::resource('types', AdminTypeController::class);
    }
);
