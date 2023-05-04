<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Custom\StaffController;
use App\Http\Controllers\Custom\MemberController;
use App\Http\Controllers\Custom\ReportController;
use App\Http\Controllers\Custom\CheckinController;
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

Route::fallback(function(){
    return redirect('admin/auth/login');
});

Route::get('/staff/list',[StaffController::class,'list_staff'])->name('staff.list');
Route::get('/staff/list/{search}',[StaffController::class,'list_staff']);
Route::get('/staff/add',[StaffController::class,'add_staff'])->name('staff.add');
Route::get('/staff/edit/{id}',[StaffController::class,'edit_staff'])->name('staff.edit');
Route::post('/staff/create',[StaffController::class,'create_staff'])->name('staff.create');
Route::post('/staff/update/{id}',[StaffController::class,'update_staff'])->name('staff.update');
Route::get('/staff/delete/{id}',[StaffController::class,'delete_staff'])->name('staff.delete');




Route::get('/member/active',[MemberController::class,'active_member'])->name('member.active');

Route::get('/member/expire',[MemberController::class,'expire_member'])->name('member.expire');

Route::get('/member/guest',[MemberController::class,'guest_member'])->name('member.guest');






Route::get('/member/list',[MemberController::class,'list_member'])->name('member.list');
Route::get('/member/list/{search}',[MemberController::class,'list_member'])->name('member.search');
Route::get('/member/add',[MemberController::class,'add_member'])->name('member.add');
Route::get('/member/edit/{id}',[MemberController::class,'edit_member'])->name('member.edit');
Route::post('/member/create',[MemberController::class,'create_member'])->name('member.create');
Route::post('/member/update/{id}',[MemberController::class,'update_member'])->name('member.update');
Route::get('/member/delete/{id}',[MemberController::class,'delete_member'])->name('member.delete');



Route::get('/ptrainer/list',[StaffController::class,'list_ptrainer'])->name('ptrainer.list');
Route::get('/ptrainer/list/{search}',[StaffController::class,'list_ptrainer']);
Route::get('/ptrainer/add',[StaffController::class,'add_ptrainer'])->name('ptrainer.add');
Route::get('/ptrainer/edit/{id}',[StaffController::class,'edit_ptrainer'])->name('ptrainer.edit');
Route::post('/ptrainer/create',[StaffController::class,'create_ptrainer'])->name('ptrainer.create');
Route::post('/ptrainer/update/{id}',[StaffController::class,'update_ptrainer'])->name('ptrainer.update');
Route::get('/ptrainer/delete/{id}',[StaffController::class,'delete_ptrainer'])->name('ptrainer.delete');




Route::get('/trainer/list/{trainer}',[StaffController::class,'list_trainer'])->name('trainer.list');
Route::get('/trainer/list/{trainer}/{search}',[StaffController::class,'list_trainer']);
Route::get('/trainer/add/{trainer}',[StaffController::class,'add_trainer'])->name('trainer.add');
Route::get('/trainer/edit/{trainer}/{id}',[StaffController::class,'edit_trainer'])->name('trainer.edit');
Route::post('/trainer/create/{trainer}',[StaffController::class,'create_trainer'])->name('trainer.create');
Route::post('/trainer/update/{trainer}/{id}',[StaffController::class,'update_trainer'])->name('trainer.update');
Route::get('/trainer/delete/{trainer}/{id}',[StaffController::class,'delete_trainer'])->name('trainer.delete');


Route::get('/checkin/member',[CheckinController::class,'checkin_form'])->name('checkin.member');

Route::post('/checkin/member',[CheckinController::class,'checkin_member']);

Route::get('/checkin/list',[CheckinController::class,'checkin_list'])->name('checkin.list');


Route::get('/admin',[CheckinController::class,'checkin']);

// Route::get('/checkin/dashboard',[CheckinController::class,'checkin'])->name('checkin');

Route::get('/checkin/dashboard',[CheckinController::class,'checkin'])->name('checkin');
Route::get('/checkin/new',[CheckinController::class,'new_member'])->name('new.member');
Route::get('/checkin/old',[CheckinController::class,'old_member'])->name('old.member');
Route::get('/checkin/guest',[CheckinController::class,'guest_member'])->name('guest.member');
Route::get('/get_section/{trainer}',[CheckinController::class,'get_section']);
Route::get('/get_member/{search}',[MemberController::class,'get_member']);
Route::get('/get_guest/{search}',[MemberController::class,'get_guest']);



Route::get('/section/list',[MemberController::class,'list_section'])->name('section.list');
Route::get('/section/list/{search}',[MemberController::class,'list_section']);
Route::get('/section/add',[MemberController::class,'add_section'])->name('section.add');
Route::get('/section/edit/{id}',[MemberController::class,'edit_section'])->name('section.edit');
Route::post('/section/create',[MemberController::class,'create_section'])->name('section.create');
Route::post('/section/update/{id}',[MemberController::class,'update_section'])->name('section.update');
Route::get('/section/delete/{id}',[MemberController::class,'delete_section'])->name('section.delete');



Route::get('/payment/list',[CheckinController::class,'list_payment'])->name('payment.list');
Route::get('/payment/list/{search}',[CheckinController::class,'list_payment']);
Route::get('/payment/add',[CheckinController::class,'add_payment'])->name('payment.add');
Route::get('/payment/edit/{id}',[CheckinController::class,'edit_payment'])->name('payment.edit');
Route::post('/payment/create',[CheckinController::class,'create_payment'])->name('payment.create');
Route::post('/payment/update/{id}',[CheckinController::class,'update_payment'])->name('payment.update');
Route::get('/payment/delete/{id}',[CheckinController::class,'delete_payment'])->name('payment.delete');

Route::POST('/new_member',[MemberController::class,'new_member'])->name('create.member.new');

Route::POST('/old_member',[MemberController::class,'old_member'])->name('create.member.old');


Route::POST('/new_guest',[MemberController::class,'new_guest'])->name('create.guest.new');

Route::POST('/old_guest',[MemberController::class,'old_guest'])->name('create.guest.old');



Route::get('/purchase/section/list',[ReportController::class,'list_purchase'])->name('purchase.section.list');

Route::get('/purchase/voucher/{id}',[ReportController::class,'voucher_purchase'])->name('purchase.voucher');

Route::get('/purchase2/voucher/{id}',[ReportController::class,'voucher_purchase2'])->name('purchase2.voucher');


Route::get('/trainer/pt/{id}',[ReportController::class,'trainer_pt_list'])->name('trainer.pt.list');

Route::get('/member/detail/{id}',[MemberController::class,'member_purchase_section'])->name('member.purchase');



Route::get('authentication-failed', function () {
    $errors = [];
    array_push($errors, ['code' => 'auth-001', 'message' => 'Invalid credential! or unauthenticated.']);
    return response()->json([
        'errors' => $errors
    ], 401);
})->name('authentication-failed');
