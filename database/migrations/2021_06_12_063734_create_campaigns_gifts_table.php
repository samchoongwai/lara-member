<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('group_id')->default('DEFAULT');
            $table->foreignId('campaign_id');
            $table->foreignId('gift_id');
            $table->integer('quota');
            $table->integer('available');
            $table->double('redeem_point', 8,0);
            $table->json('options')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('campaigns_gifts');
    }
}
