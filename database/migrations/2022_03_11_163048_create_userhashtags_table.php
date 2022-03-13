<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserhashtagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userhashtags', function (Blueprint $table) {
            $table->id('userhashtagId'); 
            $table->string('userhashtagUserid')->nullable();
            $table->longText('userhashtagTag')->nullable();
            $table->string('userhashtagCreated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userhashtags');
    }
}
