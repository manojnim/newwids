<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'categoryId';

     protected $fillable = ['categoryFor','categoryName','categoryImage','categoryStatus','categoryCreated_at'];

    public $appends = [
           'image_url'
           
    ];


    public function getImageUrlAttribute(){
        return asset('/category/'.$this->categoryImage);
    }

    
}
