<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{ 
    use HasFactory;
     public $timestamps = false;
     protected $primaryKey = 'productId';

     protected $fillable = ['productName','productPrice','productCategory_id','productDisplayimg','productDescription','productIsfeatured','productIsfeaturedStatus','productIsfeaturedexpiry','productStatus','productCreated_at'];
}
