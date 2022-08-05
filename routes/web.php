<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmaspoController;
use App\Http\Controllers\HostController;
use App\Http\Controllers\GuestController;
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

Route::controller(GuestController::class)->group(function(){
    Route::get('/', 'welcome')->name('welcome');
    Route::get('/guest_sch_event', 'guest_sch_event')->name('guest_sch_event');
    Route::get('/guest_sch_rslt', 'guest_sch_rslt')->name('guest_sch_rslt');
    Route::get('/guest/detail_event/event/{event}', 'guest_detail_event')->name('guest_detail_event');
    Route::get('/guest_mk_event', 'guest_mk_event')->name('guest_mk_event');

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
    Route::get('/show_profile', 'show_profile')->name('show_profile');
    Route::get('/edit_profile', 'edit_profile')->name('edit_profile');
    Route::put('/update_profile', 'update_profile')->name('update_profile');
    Route::get('/show_host_profile/host/{host}', 'show_host_profile')->name('show_host_profile');
    Route::post('/follow_host/{host}', 'follow_host')->name('follow_host');
    Route::delete('/unfollow_host/{host}', 'unfollow_host')->name('unfollow_host');
    Route::get('/index_follow_host', 'index_follow_host')->name('index_follow_host');
});

Route::controller(HostController::class)->group(function(){
    Route::get('/host/login', 'host_login')->name('host_login');
    Route::get('/host/register', 'host_register')->name('host_register');
    Route::post('/host/login', 'store')->name('host_post_login');
    Route::post('/host/logout', 'destroy')->name('host_logout');
});
    

Route::controller(HostController::class)->middleware('auth:host')->group(function(){
// Route::controller(HostController::class)->group(function(){
    Route::get('/host/top', 'host_top')->name('host_top');
    Route::post('/host/top', 'host_post_top')->name('host_post_top');
    Route::get('/host/mk_event', 'mk_event')->name('host_mk_event');
    Route::get('/host/str_event', 'str_event')->name('get_str_event');
    Route::get('/host/edit_event/event/{event}', 'edit_event')->name('edit_event');
    Route::put('/host/update_event/event/{event}', 'update_event')->name('update_event');
    Route::post('/host/str_event', 'str_event')->name('str_event');
    Route::get('/host/show_mked_event', 'show_mked_event')->name('show_mked_event');
    Route::get('/host/cfm_event', 'host_cfm_event')->name('host_cfm_event');
    Route::get('/host/detail_event/event/{event}', 'detail_event')->name('host_detail_event');
    Route::delete('/host/delete_event/event/{event}', 'delete_event')->name('delete_event');
    Route::get('/host/sch_event', 'host_sch_event')->name('host_sch_event');
    Route::get('/host/sch_rslt', 'host_sch_rslt')->name('host_sch_rslt');
    Route::get('host/host_show_profile', 'host_show_profile')->name('host_show_profile');
    Route::get('host/host_edit_profile', 'host_edit_profile')->name('host_edit_profile');
    Route::put('host/host_update_profile', 'host_update_profile')->name('host_update_profile');
    Route::get('host/index_follower', 'index_follower')->name('index_follower');
    Route::get('host/show_user_profile/user/{user}', 'show_user_profile')->name('show_user_profile');
    Route::get('host/show_other_host_profile/host/{host}', 'show_other_host_profile')->name('show_other_host_profile');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
