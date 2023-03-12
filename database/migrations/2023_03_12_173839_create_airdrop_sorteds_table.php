<?php

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
        Schema::create('airdrop_sorteds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');  
            $table->unsignedBigInteger('airdrop_id');
            $table->string('airdrop_name')->nullable(); 
            $table->string('airdrop_date')->nullable();
            $table->string('airdrop_price')->nullable();    
            $table->string('airdrop_wallet_token')->nullable();
            $table->tinyInteger('status')->nullable();   
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airdrop_sorteds');
    }
};
