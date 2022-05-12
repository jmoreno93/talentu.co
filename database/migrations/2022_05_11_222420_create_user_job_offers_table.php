<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserJobOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_job_offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_offer_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('job_offer_id')->references('id')->on('job_offers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_job_offers');
    }
}
