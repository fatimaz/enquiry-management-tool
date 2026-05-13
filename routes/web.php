<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EnquiryController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::resource('enquiries', EnquiryController::class);
Route::patch('/enquiries/{enquiry}/status', [EnquiryController::class, 'updateStatus'])->name('enquiries.updateStatus');


// ----------------------------------------Dashboard controller-----------------------------------
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/enquiries/new', [DashboardController::class, 'showNewEnquiries']) ->name('admin.enquiries.new');
Route::get('/admin/enquiries/reviewed', [DashboardController::class, 'showReviewedEnquiries'])->name('admin.enquiries.reviewed');
Route::get('/admin/enquiries/closed', [DashboardController::class, 'showClosedEnquiries'])->name('admin.enquiries.closed');
// ----------------------------------------end Dashboard controller-----------------------------------

