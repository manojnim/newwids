<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('userId');
            $table->string('userFirstname');
            $table->string('userLastname');
            $table->string('userEmail')->unique();
            $table->timestamp('userEmail_verified_at')->nullable();
            $table->string('userProfilepic')->nullable();
            $table->string('userPhone')->nullable();
            $table->string('userFcm_token')->nullable();
            $table->string('userLat')->nullable();
            $table->string('userLng')->nullable();
            $table->string('userPlatform')->nullable();
            $table->string('userPosition')->nullable();
            $table->string('userTwitter')->nullable();
            $table->string('userFacebook')->nullable();
            $table->string('userLinkedin')->nullable();
            $table->string('userInstragram')->nullable();
            $table->string('userYoutube')->nullable();
            $table->string('userSkype')->nullable();
            $table->string('userWechat')->nullable();
            $table->string('userType')->nullable();
            $table->longText('userAccess')->nullable();
            $table->longText('userPassword')->nullable();
            $table->tinyInteger('userStatus')->default('1');
            $table->string('userCreated_at')->nullable();
            $table->string('userUpdated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
