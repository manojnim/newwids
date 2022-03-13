<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notificationsId'); 
            $table->longText('notificationTitle')->nullable();
            $table->longText('notificationMessage')->nullable();
            $table->unsignedInteger('notificationId')->default('0');
            $table->unsignedInteger('notificationSender_id')->default('0');
            $table->unsignedInteger('notificationReceiver_id')->default('0');
            $table->unsignedInteger('notificationCustom_image')->nullable();
            $table->string('notificationLink')->nullable();
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
        Schema::dropIfExists('notifications');
    }
}
