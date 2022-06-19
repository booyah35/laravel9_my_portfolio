<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmaspoController;
use App\Http\Controllers\HostController;

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

Route::controller(AmaspoController::class)->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/sch_event', 'sch_event')->name('sch_event');
    Route::get('/cfm_event', 'cfm_event')->name('cfm_event');
    Route::get('/mk_review', 'mk_review')->name('mk_review');
    Route::get('/mk_event', 'mk_event')->name('mk_event');
});

Route::controller(HostController::class)->group(function(){
    Route::get('/host/login', 'host_login')->name('hostLogin');
    Route::get('/host/register', 'host_register')->name('hostRegister');
    
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
