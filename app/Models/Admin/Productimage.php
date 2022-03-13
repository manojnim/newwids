<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productimage extends Model
{
    use HasFactory;
     public $timestamps = false;
     protected $primaryKey = 'productimgId';

     protected $fillable = ['product_id','productImage'];
}
