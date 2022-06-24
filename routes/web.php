<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgenXTicketingController;

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
Route::get('/home', [AgenXTicketingController::class, 'HomeAgenX']);
Route::get('/publicregistration', [AgenXTicketingController::class, 'PublicRegistrationAgenX']);
Route::get('/adminlogin', [AgenXTicketingController::class, 'AdminLoginAgenX']);
Route::get('/createadmin', [AgenXTicketingController::class, 'CreateAdmin']);
Route::get('/dbAgenX', [AgenXTicketingController::class, 'DBAgenX']);
Route::get('/admincheckin', [AgenXTicketingController::class, 'AdminCheckinSearch']);
Route::get('/sudahcheckin', [AgenXTicketingController::class, 'SudahChekIn']);
Route::get('/belumcheckin', [AgenXTicketingController::class, 'BelumChekIn']);
Route::get('/confirm-checkin/{$input}', [AgenXTicketingController::class, 'ConfirmCheckin']);
Route::post('/input-tiket', [AgenXTicketingController::class, 'InputTiket'])->name('input-tiket');
Route::post('/input-admin', [AgenXTicketingController::class, 'CreateAdminReg'])->name('input-admin');
Route::post('/auth-admin', [AgenXTicketingController::class, 'AdminLoginAgenXAuth'])->name('auth-admin');
Route::post('/search-checkin', [AgenXTicketingController::class, 'SearchChekin'])->name('search-checkin');

