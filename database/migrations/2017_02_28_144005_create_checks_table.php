<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //check results table, contains result from three given sites
    //and global result will bee passed if all previous results are passed
    public function up()
    {
        Schema::create('checks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('proxy_id');
            $table->enum('google_status',
                [
                    'passed',
                    'failed',
                ])->default('failed');
            $table->enum('youtube_status',
                [
                    'passed',
                    'failed',
                ])->default('failed');
            $table->enum('pravda_status',
                [
                    'passed',
                    'failed',
                ])->default('failed');
            $table->enum('final_status',
                [
                    'passed',
                    'failed',
                ])->default('failed');
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
        Schema::dropIfExists('checks');
    }
}
