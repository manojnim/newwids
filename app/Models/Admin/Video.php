<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

     protected $primaryKey = 'videoId';

     protected $fillable = ['videoFor','videoForid','videoUrl'];
}
