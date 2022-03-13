<?php
 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Eventhashtag extends Model
{
    use HasFactory;
    protected $primarykey ='eventhashtagId';
    protected $fillable =['eventhashtagEvent_id','eventhashtagTitle'];
}
