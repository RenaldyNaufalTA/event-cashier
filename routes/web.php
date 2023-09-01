<?php

use App\Http\Controllers\Auth\{LoginController, RegisterController};
use App\Http\Controllers\{DashboardController, EventController, HomeController, MemberController, TransactionController};
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('pembayaran/{event:slug}', [EventController::class, 'pembayaran'])->name('form-pembayaran');
Route::post('/pembayaran/store', [TransactionController::class, 'store'])->name('pembayaran.store');
Route::get('/pembayaran/{transaction:unique_number}/transfer', [TransactionController::class, 'show'])->name('pembayaran.transfer');
Route::get('cek-poin-member', [MemberController::class, 'checkPoinForm'])->name('checkPoinForm');

Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    // Route::get('/register', [registerController::class, 'showRegistrationForm'])->name('register');
    // Route::post('/register', [registerController::class, 'register']);
});


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //Member
    // Route::resource('/member', MemberController::class);
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');
    Route::post('/member', [MemberController::class, 'store'])->name('member.store');
    Route::get('/member/{member:id_member}/edit', [MemberController::class, 'edit'])->name('member.edit');
    Route::put('/member/{member:id_member}', [MemberController::class, 'update'])->name('member.update');

    // Event
    Route::get('/event', [EventController::class, 'index'])->name('event.index');
    Route::post('/event', [EventController::class, 'store'])->name('event.store');
    Route::get('/event/edit/{event:slug}', [EventController::class, 'edit'])->name('event.edit');
    Route::put('/event/{event:slug}', [EventController::class, 'update'])->name('event.update');
    Route::delete('/event/{event:slug}', [EventController::class, 'destroy'])->name('event.destroy');
    Route::get('/check_slug', [EventController::class, 'checkSlug']);

    // Transaction
    Route::get('/transaction/all', [TransactionController::class, 'all'])->name('transaction.all');
    Route::get('/transaction/proses', [TransactionController::class, 'proses'])->name('transaction.proses');
    Route::get('/transaction/selesai', [TransactionController::class, 'selesai'])->name('transaction.selesai');
    Route::get('/transaction/checkin', [TransactionController::class, 'checkin'])->name('transaction.checkin');
    Route::put('/transaction/{transaction:unique_number}', [TransactionController::class, 'update'])->name('transaction.update');
    Route::put('/transaction/checkin/{transaction:unique_number}', [TransactionController::class, 'checkin_poin'])->name('checkin.poin');
    Route::get('/transaction/checkin/scan', [TransactionController::class, 'scan'])->name('scanId');
    Route::put('/transaction/checkin/scan/id', [TransactionController::class, 'scan_poin'])->name('scanId.poin');
    // Route::resource('/transaction', TransactionController::class);


    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});