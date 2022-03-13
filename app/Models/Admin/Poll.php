<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poll extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'pollId';
    protected $fillable = ['pollEvent_id','pollAgenda_id','pollTitle','pollA','pollB','pollC','pollD','pollAns','pollCreated_at'];
}
