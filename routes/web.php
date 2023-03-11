<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\DashboardController;
// use App\Http\Controllers\;
// use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ManageUsersController;
use App\Http\Controllers\Admin\DepositController;
use App\Http\Controllers\Admin\WithdrawalController;

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




Route::name('user.')->prefix('user')->group(function () {
    Route::get('/login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\Auth\LoginController@login');
    Route::post('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
    // Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register')->middleware('regStatus');
    Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register')->name('registeration');
});

Route::name('user.')->prefix('user')->group(
    function () {
        Route::middleware('auth')->group(
            function () {

                // Route for the getting the data feed
                Route::get('/json-data-feed', [DataFeedController::class, 'getDataFeed'])->name('json_data_feed');

                Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
                // claim airdrop
                Route::get('/claim-airdrop', [DashboardController::class, 'claimAirdrop'])->name('claim.airdrop');
                Route::post('/claim-airdrop/dex', [DashboardController::class, 'claimAirdropDex'])->name('my.claim.airdrop');
                Route::get('/referral', [DashboardController::class, 'ref'])->name('my.ref');
                Route::get('/make-deposit', [DashboardController::class, 'deposit'])->name('my.deposit');
                Route::post('/make-deposit/store', [DashboardController::class, 'storeDeposit'])->name('my.deposit.store');
                Route::get('/make-withdraw', [DashboardController::class, 'withdraw'])->name('my.withdraw');
                Route::post('/make-withdraw/store', [DashboardController::class, 'storeWithdraw'])->name('my.withdraw.store');



                Route::fallback(function () {
                    return view('pages/utility/404');
                });
            }
        );
    }
);

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login');
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
        // Admin Password Reset
        // Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        // Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        // Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        // Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        // Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard',  [AdminController::class, 'dashboard'])->name('dashboard');

        // mannage Users
          // Users Manager
        Route::get('users', [ManageUsersController::class, 'allUsers'])->name('users.all');
        Route::get('users/active', [ManageUsersController::class, 'activeUsers'])->name('users.active');
        Route::get('users/banned', [ManageUsersController::class, 'bannedUsers'])->name('users.banned');
        Route::get('users/email-verified', [ManageUsersController::class, 'emailVerifiedUsers'])->name('users.emailVerified');
        Route::get('users/email-unverified', [ManageUsersController::class, 'emailUnverifiedUsers'])->name('users.emailUnverified');
        Route::get('users/sms-unverified', [ManageUsersController::class, 'smsUnverifiedUsers'])->name('users.smsUnverified');
        Route::get('users/sms-verified', [ManageUsersController::class, 'smsVerifiedUsers'])->name('users.smsVerified');

        Route::get('users/{scope}/search', [ManageUsersController::class, 'search'])->name('users.search');
        Route::get('user/detail/{id}', [ManageUsersController::class, 'detail'])->name('users.detail');
        Route::get('user/referral/{id}', [ManageUsersController::class, 'userRef'])->name('users.ref');
        Route::post('user/update/{id}', [ManageUsersController::class, 'update'])->name('users.update');
        Route::post('user/add-sub-balance/{id}', [ManageUsersController::class, 'addSubBalance'])->name('users.addSubBalance');
        Route::get('user/send-email/{id}', [ManageUsersController::class, 'showEmailSingleForm'])->name('users.email.single');
        Route::post('user/send-email/{id}', [ManageUsersController::class, 'sendEmailSingle'])->name('users.email.single');
        Route::get('user/transactions/{id}', [ManageUsersController::class, 'transactions'])->name('users.transactions');
        Route::get('user/deposits/{id}', [ManageUsersController::class, 'deposits'])->name('users.deposits');
        Route::get('user/deposits/via/{method}/{type?}/{userId}', [ManageUsersController::class, 'depViaMethod'])->name('users.deposits.method');
        Route::get('user/withdrawals/{id}', [ManageUsersController::class, 'withdrawals'])->name('users.withdrawals');
        Route::get('user/withdrawals/via/{method}/{type?}/{userId}', [ManageUsersController::class, 'withdrawalsViaMethod'])->name('users.withdrawals.method');
        // Login History
        Route::get('users/login/history/{id}', [ManageUsersController::class, 'userLoginHistory'])->name('users.login.history.single');

        Route::get('users/send-email', [ManageUsersController::class, 'showEmailAllForm'])->name('users.email.all');
        Route::post('users/send-email', [ManageUsersController::class, 'sendEmailAll'])->name('users.email.send');

        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function () {
            Route::get('/', [DepositController::class, 'deposit'])->name('list');
            Route::get('pending', [DepositController::class, 'pending'])->name('pending');
            Route::get('rejected', [DepositController::class, 'rejected'])->name('rejected');
            Route::get('approved', [DepositController::class, 'approved'])->name('approved');
            Route::get('successful', [DepositController::class, 'successful'])->name('successful');
            Route::get('details/{id}', [DepositController::class, 'details'])->name('details');

            Route::post('reject', [DepositController::class, 'reject'])->name('reject');
            Route::post('approve', [DepositController::class, 'approve'])->name('approve');
            Route::get('via/{method}/{type?}', [DepositController::class, 'depViaMethod'])->name('method');
            Route::get('/{scope}/search', [DepositController::class, 'search'])->name('search');
            Route::get('date-search/{scope}', [DepositController::class, 'dateSearch'])->name('dateSearch');
        });


        // WITHDRAW SYSTEM
        Route::name('withdraw.')->prefix('withdraw')->group(function () {
            Route::get('pending', [WithdrawalController::class, 'pending'])->name('pending');
            Route::get('approved', [WithdrawalController::class, 'approved'])->name('approved');
            Route::get('rejected', [WithdrawalController::class, 'rejected'])->name('rejected');
            Route::get('log', [WithdrawalController::class, 'log'])->name('log');
            Route::get('via/{method_id}/{type?}', [WithdrawalController::class, 'logViaMethod'])->name('method');
            Route::get('{scope}/search', [WithdrawalController::class, 'search'])->name('search');
            Route::get('date-search/{scope}', [WithdrawalController::class, 'dateSearch'])->name('dateSearch');
            Route::get('details/{id}', [WithdrawalController::class, 'details'])->name('details');
            Route::post('approve', [WithdrawalController::class, 'approve'])->name('approve');
            Route::post('reject', [WithdrawalController::class, 'reject'])->name('reject');


            // Withdraw Method
            Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
            Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
            Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
            Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
            Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
            Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
            Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
        });

    });
});
