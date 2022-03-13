<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $primaryKey ='sponsorId';
    protected $fillable =['sponsorName','sponsorImage','sponsorLink','sponsorCreated_at'];

      public $appends = [
           'image_url'
           
    ];


    public function getImageUrlAttribute(){
        return asset('/sponsor/'.$this->sponsorImage);
    }

}
 