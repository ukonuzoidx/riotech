<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::redirect('/', 'login');

// Route::name('user.')->group(function () {
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);
//     Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//     Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('register', [RegisterController::class, 'register'])->middleware('regStatus');


//     // Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
//     // Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//     // Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code_verify');
//     // Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
//     // Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//     // Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');
// });

Route::middleware(['auth:sanctum'])->group(function () {

    // Route for the getting the data feed
    Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // claim airdrop
    Route::get('/claim-airdrop', [DashboardController::class, 'claimAirdrop'])->name('claim.airdrop');
    Route::post('/claim-airdrop/dex', [DashboardController::class, 'claimAirdropDex'])->name('my.claim.airdrop');
    Route::get('/referral', [DashboardController::class, 'ref'])->name('my.ref');
    Route::get('/make-deposit', [DashboardController::class, 'deposit'])->name('my.deposit');
    Route::post('/make-deposit/store', [DashboardController::class, 'storeDeposit'])->name('my.deposit.store');



    Route::fallback(function () {
        return view('pages/utility/404');
    });
});
