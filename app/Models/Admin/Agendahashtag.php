<?php
 
namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendahashtag extends Model
{
    use HasFactory;
    protected $primarykey ='agendahashtagId';
    protected $fillable =['agendahashtagAgenda_id','agendahashtagTitle'];
}
