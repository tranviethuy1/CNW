<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';
    protected $fillable=['id','type','name','image','introduce','description','price','number','color'];
    public $timestamps=false;
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
