<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            // Plan description
            $table->string('plan_name');
            $table->text('plan_description');
            $table->string('plan_price');
            //$table->string('plan_duration');
            $table->string('plan_type');
            
            // Stripe info
            $table->string('name');
            $table->string('description');
            $table->string('btn_label');
            $table->integer('amount');
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
        Schema::dropIfExists('plans');
    }
}
