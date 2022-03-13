<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id('agendaId');
            $table->unsignedInteger('agendaEvent_id');
            $table->longText('agendaTitle')->nullable();
            $table->longText('agendaSpeaker_id')->nullable();
            $table->string('agendaDate')->nullable();
            $table->string('agendaStarttime')->nullable();
            $table->string('agendaEndtime')->nullable();
            $table->string('agendaVenue')->nullable();
            $table->longText('agendaDescription')->nullable();
            $table->tinyInteger('agendaStatus')->default('1');
            $table->string('agendaCreated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
}
