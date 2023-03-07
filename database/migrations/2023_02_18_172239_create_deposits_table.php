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


        Schema::create('deposits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');  
            $table->decimal('amount', 18, 8);
            $table->text('detail')->nullable();
            $table->string('image')->nullable();
            $table->string('trx')->nullable();
            $table->integer('try')->default(0);
            $table->tinyInteger('status')->default(0);  
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
        Schema::dropIfExists('deposits');
    }
};
