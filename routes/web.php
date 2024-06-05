<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserDetail\UserController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Division\DivisionController;
use App\Http\Controllers\Rule\RuleController;

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

/* route::get('/test',function(){
    return view('login');
}); */

/* Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth'])->name('dashboard'); */

Route::middleware(['auth', 'verified'])->group(function () {
    /* all div dashboard  */
    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');

    // User Mgmt
    Route::prefix('/admin')->group(function(){
        Route::controller(UserController::class)->group(function(){
            Route::get('show-admin','index')->name('admin-show');
            Route::get('create-admin','create')->name('admin-create');
            Route::post('store-admin','store')->name('admin-store');
            Route::get('edit-admin/{id}','edit')->name('admin-edit');
            Route::post('upd-admin/{id}','update')->name('admin-upd');
            Route::get('del-admin/{id}','destroy')->name('admin-del');
        });
    });

    // Division mgmt
    Route::prefix('/division')->group(function(){
        Route::controller(DivisionController::class)->group(function(){
            Route::get('show-division','index')->name('division-show');
            Route::get('create-division','create')->name('division-create');
            Route::post('store-division','store')->name('division-store');
            Route::get('edit-division/{id}','edit')->name('division-edit');
            Route::post('upd-division/{id}','update')->name('division-upd');
            Route::get('del-division/{id}','destroy')->name('division-del');
        });
    });

    // Rule mgmt
    Route::prefix('/rule')->group(function(){
        Route::controller(RuleController::class)->group(function(){
            Route::get('show-rule','index')->name('rule-show');
        });
    });
});

require __DIR__.'/auth.php';
