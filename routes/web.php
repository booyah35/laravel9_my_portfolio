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

Route::prefix( prefix: 'host')->group(function() {
    require __DIR__.'/Host/auth.php';
});



Route::controller(AmaspoController::class)->middleware('auth:web')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/sch_event', 'sch_event')->name('sch_event');
    Route::get('/cfm_event', 'cfm_event')->name('cfm_event');
    Route::get('/mk_event', 'mk_event')->name('mk_event');
    Route::get('/sch_rslt', 'sch_rslt')->name('sch_rslt');
    Route::get('/detail_event/event/{event}', 'detail_event')->name('detail_event');
    Route::post('/join_event/{event}', 'join_event')->name('join_event');
    Route::get('/join_event/{event}', 'show_join_event')->name('show_join_event');
    Route::get('/cfm_event', 'cfm_event')->name('cfm_event');
    Route::get('/mk_review', 'mk_review')->name('mk_review');
    Route::delete('/cancel_join_event/event/{event}', 'cancel_join_event')->name('cancel_join_event');
    Route::post('/str_review', 'str_review')->name('str_review');
});

Route::controller(HostController::class)->group(function(){
    Route::get('/host/login', 'host_login')->name('host_login');
    Route::get('/host/register', 'host_register')->name('host_register');
});
    

Route::controller(HostController::class)->middleware('auth:host')->group(function(){
// Route::controller(HostController::class)->group(function(){
    Route::get('/host/top', 'host_top')->name('host_top');
    Route::post('/host/top', 'host_post_top')->name('host_post_top');
    Route::get('/host/mk_event', 'mk_event')->name('host_mk_event');
    Route::get('/host/str_event', 'str_event')->name('get_str_event');
    Route::post('/host/str_event', 'str_event')->name('str_event');
    Route::get('/host/show_mked_event', 'show_mked_event')->name('show_mked_event');
    Route::get('/host/cfm_event', 'host_cfm_event')->name('host_cfm_event');
    Route::get('/host/detail_event/event/{event}', 'detail_event')->name('host_detail_event');

    
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
