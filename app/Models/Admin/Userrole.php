<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    use HasFactory;
    public $timestamps = false;
     protected $primaryKey = 'roleId';

    protected $fillable = ['roleName'];

}
