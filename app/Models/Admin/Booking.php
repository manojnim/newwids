<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory; 
    public $timestamps = false;
    protected $primaryKey = 'bookingId';

     protected $fillable = ['bookingUserid','bookingEventid','bookingAmount','bookingQrcode','bookingRazorpay_payment_id','BookingDate'];

    public $appends = [
           'image_url'
           
    ];


    public function getImageUrlAttribute(){
        return asset('/qrcodebooking/'.$this->bookingQrcode);
    }

}
