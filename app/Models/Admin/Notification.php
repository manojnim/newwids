<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
     protected $primaryKey = 'notificationsId';
    protected $fillable = ['notificationTitle','notificationMessage','notificationType','notificationId','notificationSender_id','notificationReceiver_id','notificationCustom_image','notificationLink'];
}
