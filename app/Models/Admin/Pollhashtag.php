<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pollhashtag extends Model
{
    use HasFactory;
     protected $primarykey ='eventhashtagId';
    protected $fillable =['pollhashtagPoll_id','pollhashtagTitle'];
}
