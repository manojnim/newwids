<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'userId';

    protected $fillable = ['userFirstname','userLastname','userEmail','userProfilepic','userPhone','userPosition',
    'userType','userPassword','userCompanyname','userCompanydescription','userCompanybannerimage','userCompanylogo','userCreated_at']; 


    public $appends = [
           'image_url'
           
    ];


    public function getImageUrlAttribute(){
        return asset('/public/user/'.$this->userProfilepic);
    }



}
