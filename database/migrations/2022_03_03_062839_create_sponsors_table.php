<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id('sponsorId'); 
            $table->string('sponsorName')->nullable();
            $table->string('sponsorImage')->nullable();
            $table->string('sponsorLink')->nullable();
            $table->tinyInteger('sponsorStatus')->default('1');
            $table->string('sponsorCreated_at')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}
