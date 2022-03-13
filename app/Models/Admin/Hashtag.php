<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Hashtag extends Model
{ 
    use HasFactory;
    protected $primaryKey ='hashtagId';
    protected $fillable =['hashtagForevent','hashtagForpoll','hashtagForagenda'];
}
