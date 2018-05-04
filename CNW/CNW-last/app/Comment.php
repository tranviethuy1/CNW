<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    protected $fillable=['id','user_id','product_id','content','name_customer','created_day'];
    public function product(){
    	return $this->belongTo('App\Product');
    }
    public function user(){
    	return $this->belongTo('App\User');
    }
    public $timestamps=false;
}
