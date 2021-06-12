<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->foreignId('tier_id');
            $table->string('member_id')->unique();
            $table->string('name');
            $table->string('contact')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('pin');
            $table->double('redeem_point', 8, 0)-> default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('contact_verified_at')->nullable();
            $table->rememberToken();
            $table->string('mobile_token');
            $table->json('options')->nullable();
            $table->timestamps();
            
            $table->foreign('tier_id')->references('id')->on('tiers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
