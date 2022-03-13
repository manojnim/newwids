<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollhashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pollhashtags', function (Blueprint $table) {
            $table->id('pollhashtagId');
            $table->unsignedInteger('pollhashtagPoll_id');
            $table->string('pollhashtagTitle')->nullable();
            $table->unsignedInteger('pollhashtagStatus')->default('1');
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
        Schema::dropIfExists('pollhashtags');
    }
}
