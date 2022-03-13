<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreatePollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polls', function (Blueprint $table) {
            $table->id('pollId'); 
            $table->string('pollEvent_id')->nullable();
            $table->string('pollAgenda_id')->nullable();
            $table->string('pollTitle')->nullable();
            $table->string('pollA')->nullable();
            $table->string('pollB')->nullable();
            $table->string('pollC')->nullable();
            $table->string('pollD')->nullable();
            $table->string('pollAns')->nullable();
            $table->tinyInteger('pollStatus')->default('1');
            $table->string('pollCreated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polls');
    }
}
