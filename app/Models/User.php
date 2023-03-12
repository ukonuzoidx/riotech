<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'ref_code',
        'ref_by',
        'busd_wallet',
        'balance',  
        'total_deposit',    
        'total_airdrop',    
        'total_referral',
        'last_paid_deposit' 

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }   

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }   

    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }

    public function airdrops()
    {
        return $this->hasMany(Airdrop::class);
    }

    public function airdrop_sorted()
    {
        return $this->hasMany(AirdropSorted::class);
    }
}
