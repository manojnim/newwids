<?php
 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
class Speaker extends Model
{ 
    use HasFactory;
     public $timestamps = false;
     protected $primaryKey = 'speakerId';

     protected $fillable = ['speakerEvent_id','speakerFirstname','speakerLastname','speakerEmail','speakerPhone','speakerLocation','speakerDesignation','speakerAboutus','speakerCompanyname','speakerHighest_education_qualification','speakerLinkedin','speakerTopic','speakerProfilepic','speakerCreated_at'];


     public $appends = [
           'image_url'
           
    ];


    public function getImageUrlAttribute(){
        return asset('/speaker/'.$this->speakerProfilepic);
    }


}
