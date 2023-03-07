<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->string('ref_code')->nullable();
            $table->string('ref_by')->nullable();
            $table->string('busd_wallet')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('current_team_id')->nullable();
            // $table->integer('plan_id')->default(0);
            $table->string('profile_photo_path', 2048)->nullable();
            $table->decimal('balance', 18, 8)->default(0.00000000);
            $table->decimal('total_deposit', 18, 8)->default(0.00000000);
            $table->decimal('total_airdrop', 18, 8)->default(0.00000000);
            $table->decimal('total_referral', 18, 8)->default(0.00000000);
            $table->timestamp('last_paid_deposit')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        $users = User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'balance' => 0.000000000,
            'total_deposit' => 50.000000000,
            'total_airdrop' => 0.000000000,
            'total_referral' => 0.000000000,
            'ref_code' => Str::random(6),
            // 'last_paid_deposit' => 
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
