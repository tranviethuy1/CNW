<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carts extends Model
{
    protected $table = "carts";
    protected $fillable=['id','rowid','customer','product_id','product_name','product_color','product_number','product_price','create_at'];
    public $timestamps=false;
}
