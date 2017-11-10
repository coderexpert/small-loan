<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/member/apply-loan', 'HomeController@member_apply_loan')->name('member_apply_loan');
Route::get('/member/contribution',
'HomeController@member_contribution')->name('member_contribution');
Route::post('/member/contribution/submit', 'HomeController@member_submit_contribution')->name('member_submit_contribution');

Route::get('/admin/dashboard', 'AdminController@index')->name('admin_dashboard');

Route::get('/admin/members', 'AdminController@members')->name('admin_members');

Route::get('/admin/members/loans', 'AdminController@members_loans')->name('admin_members_loans');
Route::post('/admin/members/loan/approve/{loan}', 'AdminController@approveLoan')->name('approveLoan');
Route::post('/admin/members/contribution/approve/{contribution}', 'AdminController@approveContribution')->name('approveContribution');

Route::get('/admin/members/contributions', 'AdminController@members_contributions')->name('admin_members_contributions');

Route::get('/admin/members/broadcast', 'AdminController@broadcast')->name('admin_members_broadcast');
Route::post('/admin/members/broadcast/send', 'AdminController@save_broadcast')->name('admin_members_save_broadcast');
