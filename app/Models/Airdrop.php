<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Airdrop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function airdrop_sorted()
    {
        return $this->belongsTo(AirdropSorted::class, 'id');
    }
}
