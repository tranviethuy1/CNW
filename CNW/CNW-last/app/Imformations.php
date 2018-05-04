<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imformations extends Model
{
    protected $table='imformations';
    protected $fillable=['id','name','male','birth','avatar','id_employee'];
    public $timestamps=false;
}
