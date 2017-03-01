<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProxiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //includes all values except "last check" from
    // hidemy and status(we can enable or diseble this proxy for further checks)
    public function up()
    {
        Schema::create('proxies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip');
            $table->string('port');
            $table->string('location');
            $table->string('speed');
            $table->string('type');
            $table->string('anon');
            $table->enum('status',
                [
                    'enabled',
                    'disabled',
                ])->default('enabled');
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
        Schema::dropIfExists('proxies');
    }
}
