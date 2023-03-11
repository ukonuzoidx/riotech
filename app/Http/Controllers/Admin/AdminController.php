<?php

namespace App\Http\Controllers\Admin;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Withdraw;

class AdminController extends Controller
{
    public function dashboard()
    {
        $page_title = 'Dashboard';
        $page = 'dashboard';

        // get all users counnt
        $data['total_users'] = User::count();
        $data['total_balance'] = User::sum('balance');
        $data['total_deposit'] = User::sum('total_deposit');
        $data['total_airdrop'] = User::sum('total_airdrop');


        // $data['total_balance'] = User::sum('balance');

        // deposit
        $data['total_deposit_pending'] = Deposit::where('status', 0)->count();
        $data['total_deposit_reject'] = Deposit::where('status', 2)->count();

        // withdraw
        $data['total_withdraw_pending'] = Withdraw::where('status', 0)->count();
        $data['total_withdraw_reject'] = Withdraw::where('status', 2)->count();




        return view('admin.dashboard', $data, compact('page_title', 'page'));
    }
}
