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
        $airdrops = Airdrop::latest()->get();
        $page_title = 'General Settings';
        return view('admin.settings.airdrop_settings', compact('page_title', 'airdrops'));
    }

    // store
    public function store(Request $request)
    {
        $airdrop = new Airdrop();
        $airdrop->airdrop_price = $request->airdrop_price;
        $airdrop->airdrop_name = $request->airdrop_name;
        $airdrop->airdrop_wallet_token = $request->airdrop_wallet_token;
        $airdrop->save();

        $notify[] = ['success', 'Airdrop Set.'];
        return back()->withNotify($notify);
    }

    public function update(Request $request)
    {



        $general_setting = Airdrop::first();
        $request->merge(['airdrop_status' => 1]);
        $request->merge(['airdrop_data' => Carbon::now()]);


        $general_setting->update($request->only(['airdrop_price', 'aidrop_status', 'airdrop_date']));
        $notify[] = ['success', 'Airdrop for today has been set.'];
        return back()->withNotify($notify);
    }
}
