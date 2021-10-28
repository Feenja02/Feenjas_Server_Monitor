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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/users', function () {
    return view('users.index');
})->middleware(['auth'])->name('users');

Route::get('/warnings', function(){
    return view('warnings.index');
})->middleware(['auth'])->name('warnings');

Route::get('/timeline/{client}', [\App\Http\Controllers\TimelineController::class,'get'])->middleware(['auth'])->name('timeline');

/** Clients */
Route::get('/clients', function(){
    return view('clients.index');
})->middleware(['auth'])->name('clients');

Route::get('/client.create', [\App\Http\Controllers\ClientController::class, 'create'])
    ->middleware('auth')
    ->name('client.create');

Route::post('/client.create', [\App\Http\Controllers\ClientController::class, 'store'])
    ->middleware('auth');

Route::get('/clients/destroy/{client}', [\App\Http\Controllers\ClientController::class, 'destroy'])->name('client.destroy');
Route::get('/clients/edit/{client}', [\App\Http\Controllers\ClientController::class, 'edit'])->name('client.edit');
Route::post('/clients/update/{client}', [\App\Http\Controllers\ClientController::class, 'update'])->name('client.update');

/** de- & activating on dashboard */
Route::get('/clients/activate/{client}', [\App\Http\Controllers\ClientController::class, 'activate'])->name('client.activate');
Route::get('/clients/deactivate/{client}', [\App\Http\Controllers\ClientController::class, 'deactivate'])->name('client.deactivate');

/*Route::get('/create_user', function () {
    return view('users.create');
})->middleware(['auth'])->name('create_users');*/



require __DIR__.'/auth.php';
