<?php

use App\Models\Airdrop;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airdrops', function (Blueprint $table) {
            $table->id();
            $table->decimal('airdrop_price', 18, 2)->default(0.00000000);
            $table->tinyInteger('airdrop_status')->nullable();
            $table->string('airdrop_date')->nullable(); 
            $table->timestamps();
        });

        Airdrop::create([
            'airdrop_price' => 0.00000000,
            'airdrop_status' => 0,
            'airdrop_date' => Carbon::now(),
        
        ]);


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airdrops');
    }
};
