<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gifts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('sku')->unique();
            $table->string('name');
            $table->text('description');
            $table->double('cost', 8, 2)->default(0);
            $table->double('worth', 8, 2)->default(0);
            $table->integer('stock_initial')->default(0);
            $table->integer('stock_current')->default(0);
            $table->boolean('is_active')->default(true);
            $table->json('options')->nullable();
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
        Schema::dropIfExists('gifts');
    }
}
