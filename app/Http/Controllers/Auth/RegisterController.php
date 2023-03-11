<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Epin;
use App\Models\Frontend;
use App\Models\GeneralSetting;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserExtra;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Str;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('regStatus')->except('registrationNotAllowed');

        // $this->activeTemplate = activeTemplate();
    }



    public function showRegistrationForm(Request $request)
    {
        // $content = Frontend::where('data_keys', 'sign_up.content')->first();
        // $info = json_decode(json_encode(getIpInfo()), true);
        // $country_code = @implode(',', $info['code']);

        // if ($request->ref && $request->position) {
        //     $ref_user = User::where('username', $request->ref)->first();
        //     if ($ref_user == null) {
        //         $notify[] = ['error', 'Invalid Referral link.'];
        //         return redirect()->route('home')->withNotify($notify);
        //     }

        //     if ($request->position == 'left') {

        //         $position = 1;
        //     } elseif ($request->position == 'right') {
        //         $position = 2;
        //     } else {
        //         $notify[] = ['error', 'Invalid referral position'];
        //         return redirect()->route('home')->withNotify($notify);
        //     }

        //     $pos = getPosition($ref_user->id, $position);

        //     $join_under = User::find($pos['pos_id']);

        //     if ($pos['position'] == 1)
        //         $get_position = 'Left';

        //     else {
        //         $get_position = 'Right';
        //     }

        //     $joining = "<span class='help-block2'><strong class='custom-green' >Your are joining under $join_under->username at $get_position  </strong></span>";

        //     $page_title = "Sign Up";
        //     return view($this->activeTemplate . 'user.auth.register', compact('page_title', 'ref_user', 'joining', 'content',  'position', 'country_code'));

        // }


        $page_title = "Sign Up";
        return view('auth.register', compact('page_title'));
    }



    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    // protected function validator(array $data)
    // {

    //     $validate =  Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'username' => ['required', 'string', 'max:255', 'unique:users'],
    //         'busd_wallet' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => $this->passwordRules(),
    //         'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
    //     ]);

    //     return $validate;
    // }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'      => 'required|string|max:160',
            'email'         => 'required|unique:users|string|email|max:160',
            'busd_wallet'        => 'required|string|max:30',
            // 'phone'        => 'required|string|max:30',
            'password'      => 'required|string|min:4|confirmed',
            'username'      => 'required|unique:users|min:2',

        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        // check if the ref_code is null 
        if ($request->referral != null) {
            // check if the ref_code is valid
            $referral = User::where('ref_code', $request->referral)->first();
            if (!$referral) {
                $notify[] = ['error', 'Referral not found.'];
                return back()->withNotify($notify);
            }
        }


        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Model\User
     */
    protected function create(array $data)
    {
        if ($data['ref_code'] == null) {
            // check if the ref_code is valid
            $ref_by = null;


            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'username' => $data['username'],
                'busd_wallet' => $data['busd_wallet'],
                'ref_code' => Str::random(6),
                'ref_by' => null,
                'password' => Hash::make($data['password']),
                'balance' => 0,
                'total_deposit' => 0,
                'total_airdrop' => 0,
            ]);

            return $user;
        } else {
            $ref_by = User::where('ref_code', $data['ref_code'])->first();
            if ($ref_by) {
                $ref = $ref_by->id;

                /**
                 * check how the total deposit of the user
                 * if the user deposit balance is greater than zero get 5 % of it
                 * else do no give the user anything
                 *
                 */
                // convert $ref_by->total_deposit to double
                $toD = (float) $ref_by->total_deposit;
                if ($toD > 0) {
                    $ref_by->total_referral = $toD * 0.05;
                    $ref_by->balance = $toD * 0.05;

                    $ref_by->save();
                }


                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'username' => $data['username'],
                    'busd_wallet' => $data['busd_wallet'],
                    'ref_code' => Str::random(6),
                    'ref_by' => $ref,
                    'password' => Hash::make($data['password']),
                    'balance' => 0,
                    'total_deposit' => 0,
                    'total_airdrop' => 0,
                    'total_referral' => 0,
                ]);


                return $user;
            }
        }
    }



    public function registered(Request $request, $user)
    {
        return redirect()->route('user.home');
    }
}
