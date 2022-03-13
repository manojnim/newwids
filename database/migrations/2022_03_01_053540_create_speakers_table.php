<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeakersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speakers', function (Blueprint $table) {
           $table->id('speakerId');
            $table->unsignedInteger('speakerEvent_id')->nullable();
            $table->string('speakerFirstname')->nullable();
            $table->string('speakerLastname')->nullable();
            $table->string('speakerEmail')->nullable();
            $table->string('speakerPhone')->nullable();
            $table->string('speakerLocation')->nullable();
            $table->string('speakerDesignation')->nullable();
            $table->longText('speakerAboutus')->nullable();
            $table->string('speakerLinkedin')->nullable();
            $table->string('speakerTopic')->nullable();
            $table->string('speakerProfilepic')->nullable();
            $table->tinyInteger('speakerStatus')->default('1');
            $table->timestamp('speakerCreated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('speakers');
    }
}
