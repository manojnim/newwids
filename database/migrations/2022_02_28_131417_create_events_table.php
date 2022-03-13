<?php
 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('eventId');
            $table->string('eventName')->nullable();
            $table->string('eventCode')->nullable();
            $table->unsignedInteger('eventCategory_id');
            $table->unsignedInteger('eventOrganizer_id');
            $table->longText('eventDescription')->nullable();
            $table->string('eventStartdate')->nullable();
            $table->string('eventEnddate')->nullable();
            $table->string('eventStarttime')->nullable();
            $table->string('eventEndtime')->nullable();
            $table->string('eventBanneroneimg')->nullable();
            $table->string('eventType')->nullable();
            $table->string('eventAmount')->nullable();
            $table->string('eventBannertwoimg')->nullable();
            $table->string('eventQrcode')->nullable();
            $table->longText('eventLocation')->nullable();
            $table->string('eventTwitter')->nullable();
            $table->string('eventFacebook')->nullable();
            $table->string('eventLinkedin')->nullable();
            $table->string('eventInstragram')->nullable();
            $table->string('eventYoutube')->nullable();
            $table->string('eventSkype')->nullable();
            $table->string('eventWechat')->nullable();
            $table->tinyInteger('eventTrendingstatus')->default('0');
            $table->tinyInteger('eventStatus')->default('1');
            $table->timestamp('eventCreated_at')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
