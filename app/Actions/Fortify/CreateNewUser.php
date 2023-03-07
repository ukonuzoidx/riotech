<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'busd_wallet' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        if (isset($input['ref_code'])) {
            $ref_by = User::where('ref_code', $input['ref_code'])->first();
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
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'username' => $input['username'],
                    'busd_wallet' => $input['busd_wallet'],
                    'ref_code' => Str::random(6),
                    'ref_by' => $ref,
                    'password' => Hash::make($input['password']),
                    'balance' => 0,
                    'total_deposit' => 0,
                    'total_airdrop' => 0,
                    'total_referral' => 0,
                ]);


                return $user;
            } else {
                $ref_by = null;


                return User::create([
                    'name' => $input['name'],
                    'email' => $input['email'],
                    'username' => $input['username'],
                    'busd_wallet' => $input['busd_wallet'],
                    'ref_code' => Str::random(6),
                    'ref_by' => $ref_by,
                    'password' => Hash::make($input['password']),
                    'balance' => 0,
                    'total_deposit' => 0,
                    'total_airdrop' => 0,
                ]);
            }
        } else {
            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
                'busd_wallet' => $input['busd_wallet'],
                'ref_code' => Str::random(6),
                'ref_by' => null,
                'password' => Hash::make($input['password']),
                'balance' => 0,
                'total_deposit' => 0,
                'total_airdrop' => 0,
            ]);
        }
    }
}
