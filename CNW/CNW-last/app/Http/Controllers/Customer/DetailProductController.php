<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Comment;

class DetailProductController extends Controller
{
    public function getDetailProduct($idemail,$idproduct){
      // sau khi update xong tao phai load update theo tên tất cả
    	$name_email=DB::table('users')->where('id',$idemail)->value('email');
      $name_user=DB::table('imformations')->where('id_employee',$idemail)->value('name');

      if($name_user==null){
          $name_user='Customer'.$idemail;
      }

      if($name_email==null){
        $name_email="";
      }

    	$data_detail_product=DB::table('product')->where('id',$idproduct)->first();
      // User đó có chat
      $number_id_user=DB::table('comment')->where('user_id',$idemail)->count();

      $new_name=DB::table('imformations')->where('id_employee',$idemail)->value('name');

      if($new_name==null){
        $new_name='';
      }
      if(($number_id_user>=1)&&!empty($new_name)){
         //$new_name=DB::table('comment')->orderBy('id', 'desc')->first()->name_customer;
         $comment=new Comment;
         $data_update=['name_customer'=> $new_name];
         $comment->where('user_id',$idemail)->update($data_update);          
      }

      $list_comment=DB::table('comment')->where('product_id',$idproduct)->orderBy('id','desc')->paginate(3);
    	$data=array(
    		'nameEmail'=>$name_email,
            'idEmail'=>$idemail,
    		'detailProduct'=>$data_detail_product,
            'comment'=>$list_comment,
        'nameUser'=>$name_user
    	);
    	return view('CNW.product_detail')->with('data',$data);
    }
}
