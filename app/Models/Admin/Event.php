<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $primaryKey = 'eventId';

     protected $fillable = ['eventName','eventCategory_id','eventOrganizer_id','eventDescription','eventStarttime','eventEndtime','eventStartdate','eventEnddate','eventBanneroneimg','eventType','eventAmount','eventBannertwoimg','eventQrcode','eventStatus','eventLocation','eventCreated_at'];

     public $appends = [
           'event_banner_img1',
           'event_banner_img2'
         
           
    ];


    public function getEventBannerImg1Attribute(){
        return asset('/public/event/'.$this->eventBanneroneimg);
      
    }

     


    public function getEventBannerImg2Attribute(){
        return asset('/public/event/'.$this->eventBannertwoimg);
      
    }


} 
