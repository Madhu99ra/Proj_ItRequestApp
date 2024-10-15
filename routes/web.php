<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

;
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


Route::get('/', [LoginController::class, 'viewlogin']);
Route::get('/register', [LoginController::class, 'viewregister']);
Route::get('/resetPW', [LoginController::class, 'viewresetPW']);
Route::get('/userdashboard', [LoginController::class, 'viewserdashboard']);
Route::get('/logout', [LoginController::class, 'logout']);
Route::post('/store-users',[LoginController::class, 'storeusers'])->name('store-users');
Route::post('/login-users',[LoginController::class, 'loginusers'])->name('login-users');



Route::get('/request', [UserController::class, 'viewusername']);
Route::get('/viewrequest', [UserController::class, 'viewrequest']);
Route::get('/completedrequest', [UserController::class, 'completedrequest']);
Route::post('/complete-profile', [UserController::class, 'completeProfile'])->name('complete-profile');
Route::post('/store-pendingreq',[UserController::class, 'storependingreq'])->name('store-pendingreq');



Route::get('/admindashboard', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
Route::get('/admincompletedrequest', [AdminController::class, 'admincompletedrequest']);
Route::get('/viewattend', [AdminController::class, 'viewattend'])->name('viewattend');
Route::get('/adminviewrequest', [AdminController::class, 'adminviewrequest'])->name('adminviewrequest');
Route::post('/update-request/{id}', [AdminController::class, 'updateRequestStatus'])->name('updateRequestStatus');








