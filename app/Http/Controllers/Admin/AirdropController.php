<?php

namespace App\Http\Controllers\Admin;

use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use App\Models\Airdrop;
use App\Models\Transaction;
use App\Models\User;
use App\Models\WithdrawMethod;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AirdropController extends Controller
{
    public function index()
    {
        $general = Airdrop::first();
        $page_title = 'General Settings';
        return view('admin.settings.airdrop_settings', compact('page_title', 'general'));
    }

    public function update(Request $request)
    {



        $general_setting = Airdrop::first();
        $request->merge(['airdrop_status' => 1 ]);
        $request->merge(['airdrop_data' => Carbon::now()]);


        $general_setting->update($request->only(['airdrop_price', 'aidrop_status', 'airdrop_date']));
        $notify[] = ['success', 'Airdrop for today has been set.'];
        return back()->withNotify($notify);
    }
}
