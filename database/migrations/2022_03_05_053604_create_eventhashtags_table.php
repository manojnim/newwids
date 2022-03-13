<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventhashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventhashtags', function (Blueprint $table) {
            $table->id('eventhashtagId');
            $table->unsignedInteger('eventhashtagEvent_id');
            $table->string('eventhashtagTitle')->nullable();
            $table->unsignedInteger('eventhashtagStatus')->default('1');
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
        Schema::dropIfExists('eventhashtags');
    }
}
 