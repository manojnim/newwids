<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendahashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendahashtags', function (Blueprint $table) {
            $table->id('agendahashtagId');
            $table->unsignedInteger('agendahashtagAgenda_id');
            $table->string('agendahashtagTitle')->nullable();
            $table->unsignedInteger('agendahashtagStatus')->default('1');
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
        Schema::dropIfExists('agendahashtags');
    }
}
