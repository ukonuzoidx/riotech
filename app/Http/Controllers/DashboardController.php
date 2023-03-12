<?php

namespace App\Http\Controllers;

use App\Models\Airdrop;
use App\Models\AirdropSorted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DataFeed;
use App\Models\Deposit;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdraw;
use Carbon\Carbon;
use Image;

class DashboardController extends Controller
{


    /**
     * Displays the dashboard screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {

        // get all referrals for auth user
        $data['total_ref'] = User::where('ref_by', auth()->id())->count();
        $data['logs'] = User::where('ref_by', auth()->id())->latest()->take(5)->get();
        $data['airdrops'] = Airdrop::with(['airdrop_sorted'])->latest()->get();

        // dd($data);

        getDailyFromDeposit(auth()->id());

        return view('pages/dashboard/dashboard', $data);
    }

    /**
     * Displays the referral screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function ref()
    {
        $data['ref_code'] = auth()->user()->ref_code;
        $data['ref_link'] = url('/register?ref_code=' . auth()->user()->ref_code);
        $data['total_ref'] = User::where('ref_by', auth()->id())->count();
        $data['logs'] = User::where('ref_by', auth()->id())->latest()->paginate(10);

        return view('pages/dashboard/referral', $data);
    }

    /**
     * Displays the deposit screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function deposit()
    {
        $data['deposits'] = Deposit::where('user_id', auth()->id())->latest()->paginate(10);

        return view('pages/dashboard/deposit', $data);
    }
    /**
     * Displays the withdraw screen
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function storeDeposit(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            // 'image' => 'mimes:png,jpg,jpeg'
        ]);

        $user = auth()->user();

        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '_' . $user->username . '.jpg';
        //     $location = 'assets/images/user/deposit/' . $filename;
        //     $in['image'] = $filename;

        //     $path = './assets/images/user/deposit/';
        //     $link = $path . $user->image;
        //     if (file_exists($link)) {
        //         @unlink($link);
        //     }
        //     $size = imagePath()['verify']['deposit']['size'];
        //     $image = Image::make($image);
        //     $size = explode('x', strtolower($size));
        //     $image->resize($size[0], $size[1]);
        //     $image->save($location);
        // }

        $in['user_id'] = $user->id;
        $in['amount'] = $request->amount;
        $in['detail'] = 'Deposit request from ' . $user->username . ' with an amount of ' . $request->amount;
        $in['trx'] = getTrx();
        $in['status'] = 0;
        Deposit::create($in);

        $transaction = new Transaction();
        $transaction->user_id = $in['user_id'];
        $transaction->amount = $in['amount'];
        $transaction->post_balance = getAmount($user->balance);
        // $transaction->charge = getAmount($data->charge);
        $transaction->trx_type = '+';
        $transaction->details = 'Deposit request from ' . $user->username . ' with an amount of ' . $request->amount;
        $transaction->trx = $in['trx'];
        $transaction->save();

        $notify[] = ['success', 'Deposit request has been sent successfully.'];
        return back()->withNotify($notify);
    }

    public function withdraw()
    {
        $data['withdraws'] = Withdraw::where('user_id', auth()->id())->latest()->paginate(10);


        return view('pages/dashboard/withdraw', $data);
    }
    public function storeWithdraw(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
        ]);

        $user = auth()->user();


        if (getAmount($request->amount) > $user->balance) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Current Balance.'];
            return back()->withNotify($notify);
        }



        $in['user_id'] = $user->id;
        $in['amount'] =  getAmount($request->amount);
        $in['currency'] = 'USD';
        // $in['charge'] = $request->charge;
        // $in['final_amount'] = $request->final_amount;
        // $in['after_charge'] = $request->after_charge;
        $in['detail'] = 'Withdraw request from ' . $user->username . ' with an amount of ' . $request->amount;
        $in['trx'] = getTrx();

        $in['status'] = 0;
        $in['is_airdrop'] = 0;
        Withdraw::create($in);

        $user->balance -= $request->amount;
        $user->save();



        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = getAmount($request->amount);
        $transaction->post_balance = getAmount($user->balance);
        // $transaction->charge = getAmount($withdraw->charge);
        $transaction->trx_type = '-';
        $transaction->details =
            'Withdraw request from ' . $user->username . ' with an amount of ' . $request->amount;
        $transaction->trx =  $in['trx'];
        $transaction->save();

        $notify[] = ['success', 'Withdraw request has been sent successfully.'];
        return back()->withNotify($notify);
    }
    public function storeWithdrawAirdrop(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10',
            'withdraw_information' => 'required',
            // ''
        ]);
        // dd($request->all());

        $user = auth()->user();


        if (getAmount($request->amount) > $user->total_airdrop) {
            $notify[] = ['error', 'Your Request Amount is Larger Then Your Total Airdrop.'];
            return back()->withNotify($notify);
        }



        $in['user_id'] = $user->id;
        $in['amount'] =  getAmount($request->amount);
        $in['currency'] = $request->airdrop_currency;
        // $in['charge'] = $request->charge;
        // $in['final_amount'] = $request->final_amount;
        // $in['after_charge'] = $request->after_charge;
        $in['detail'] = 'Withdraw request from ' . $user->username . ' with an amount of ' . $request->amount;
        $in['withdraw_information'] = $request->withdraw_information;
        $in['trx'] = getTrx();
        $in['status'] = 0;
        $in['is_airdrop'] = 1;

        Withdraw::create($in);

        $user->total_airdrop -= $request->amount;
        $user->save();



        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->amount = getAmount($request->amount);
        $transaction->post_balance = getAmount($user->total_airdrop);
        // $transaction->charge = getAmount($withdraw->charge);
        $transaction->trx_type = '-';
        $transaction->details =
            'Withdraw request from ' . $user->username . ' with an amount of ' . $request->amount;
        $transaction->trx =  $in['trx'];
        $transaction->save();

        $notify[] = ['success', 'Withdraw request has been sent successfully.'];
        return back()->withNotify($notify);
    }



    /**
     * Claim an airdrop
     *
     * 
     */
    public function claimAirdrop()
    {
        $user = auth()->user();
        $airdrop = Airdrop::first();
        $date = Carbon::parse($airdrop->airdrop_date);
        // get the last_paid_deposit using carbon
        $last_paid_deposit = Carbon::parse($user->last_login);
        // get the current time using carbon    
        $now = Carbon::now();

        if ($date->diffInHours($now) >= 24) {

            $notify[] = ['error', 'Airdrop for today has not been set.'];
            return back()->withNotify($notify);
        } else
            // check if the user is activated
            if ($user->status == 0) {
                $notify[] = ['error', 'Your account is not active. Make a Deposit to claim.'];
                return back()->withNotify($notify);
            } else {

                // check if the last_paid_deposit is exist or its null
                if ($user->last_login == null) {
                    if ($user->total_airdrop > 0) {
                        // if yes assign 1 percent to the deposit to the user
                        // $user->balance += ($user->total_airdrop);

                        // $user->save();
                    }
                    // after assigning the 1 percent make sure the user doesn't get it again till after 24 hours  
                    $user->total_airdrop += $airdrop->airdrop_price;
                    $user->last_login = Carbon::now();
                    $user->save();
                } elseif ($last_paid_deposit->diffInHours($now) >= 24) {
                    // check if the total_deposit of this user is > 0 
                    // if ($user->total_deposit > 0) {
                    //     // if yes assign 1 percent to the deposit to the user
                    //     $user->balance += ($user->total_deposit * 0.01);

                    //     $user->save();
                    // }
                    // after assigning the 1 percent make sure the user doesn't get it again till after 24 hours
                    $user->total_airdrop += $airdrop->airdrop_price;
                    $user->last_login = Carbon::now();
                    $user->save();
                } else {
                    $notify[] = ['error', 'You can claim airdrop once in 24 hours.'];
                    return back()->withNotify($notify);
                }
            }
        $notify[] = ['success', 'Airdrop has been claimed successfully.'];
        return back()->withNotify($notify);
    }

    function claimAirdropDex(Request $request)
    {
        $user = auth()->user();
        $airdrop = Airdrop::find($request->id);

        // check if the user has claimed this airdrop from airdrop_sort 
        $airdrop_sort = AirdropSorted::where('user_id', $user->id)->where('airdrop_id', $airdrop->id)->first();

        // dd($airdrop_sort);
        // check if the user is activated   
        if ($user->status == 0) {
            $notify[] = ['error', 'Your account is not active. Make a Deposit to claim.'];
            return back()->withNotify($notify);
        } else {
            // check if the user has claimed this airdrop from airdrop_sort
            if ($airdrop_sort == null) {
                $airdrop_sorted = new AirdropSorted();
                $airdrop_sorted->user_id = $user->id;
                $airdrop_sorted->airdrop_id = $airdrop->id;
                $airdrop_sorted->airdrop_name = $airdrop->airdrop_name;
                $airdrop_sorted->airdrop_price = $airdrop->airdrop_price;
                $airdrop_sorted->airdrop_wallet_token = $airdrop->airdrop_wallet_token;
                $airdrop_sorted->status = 1;
                $airdrop_sorted->save();
                // if no assign the airdrop to the user
                // $user->airdrops()->attach($airdrop->id);
                // assign the airdrop amount to the user
                $user->total_airdrop += $airdrop->airdrop_price;
                $user->save();

                $notify[] = ['success', 'Airdrop has been claimed successfully.'];
                return back()->withNotify($notify);
            } elseif ($airdrop_sort->airdrop_id == $airdrop->id) {


                $notify[] = ['error', 'You have already claimed this airdrop.'];
                return back()->withNotify($notify);
            } else {
                $airdrop_sorted = new AirdropSorted();
                $airdrop_sorted->user_id = $user->id;
                $airdrop_sorted->airdrop_id = $airdrop->id;
                $airdrop_sorted->airdrop_name = $airdrop->airdrop_name;
                $airdrop_sorted->airdrop_price = $airdrop->airdrop_price;
                $airdrop_sorted->airdrop_wallet_token = $airdrop->airdrop_wallet_token;
                $airdrop_sorted->status = 1;
                $airdrop_sorted->save();
                // if no assign the airdrop to the user
                // $user->airdrops()->attach($airdrop->id);
                // assign the airdrop amount to the user
                $user->total_airdrop += $airdrop->airdrop_price;
                $user->save();

                $notify[] = ['success', 'Airdrop has been claimed successfully.'];
                return back()->withNotify($notify);
            }
        }
    }
}
