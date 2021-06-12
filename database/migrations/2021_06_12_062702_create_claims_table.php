<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('code')->unique();
            $table->foreignId('member_id');
            $table->foreignId('campaign_id');
            $table->foreignId('gift_id');
            $table->double('redeem_point', 8, 2)->default(0);
            $table->char('status', 10)->default('OPEN');
            $table->json('options')->nullable();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('campaign_id')->references('id')->on('campaigns');
            $table->foreign('gift_id')->references('id')->on('gifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
