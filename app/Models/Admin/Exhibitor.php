<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhibitor extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $primaryKey = 'exhibitorId';

     protected $fillable = ['exhibitorEvent_id','exhibitorCompanyname','exhibitorCompanydescription','exhibitorCompanybannerimage','exhibitorCompanylogo','exhibitorEmail ','exhibitorPhone','exhibitorPassword'];
}
