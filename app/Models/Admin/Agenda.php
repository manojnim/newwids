<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $primaryKey = 'agendaId';

     protected $fillable = ['agendaTitle','agendaEvent_id','agendaSpeaker_id','agendaDate','agendaStarttime','agendaEndtime','agendaVenue','agendaDescription','agendaCreated_at'];
}
 