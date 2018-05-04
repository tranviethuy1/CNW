<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Comment;
use Illuminate\Support\Facades\Redirect;
use Session;
class CommentProductController extends Controller
{
    public function SaveComment(Request $request,$idproduct,$idemail){
        $name_user='';
        $name_user=DB::table('imformations')->where('id_employee',$idemail)->value('name');
        if($name_user==null){
            $name_user='Customer'.$idemail;
        }
    	$email_current=DB::table('users')->where('id',$idemail)->value('email');
        if($email_current!=null)
        {
            $idCustomer=DB::table('users')->where('email',$email_current)->value('id');
            if((strcmp($request->address_email,$email_current)==0) && (strcmp($request->name_customer,$name_user)==0)){
                $comment=new Comment();
                $comment->content=$request->content_comment;
                $comment->name_customer=$request->name_customer;
                $comment->user_id=$idCustomer;
                $comment->product_id=$idproduct;
                // date('d/m/Y - H:i:s')
                $comment->created_day=date("Y-m-d H:i:s");
                $comment->save();
                return Redirect()->route('ProductDetail',['idemail'=>$idCustomer,'idproduct'=>$idproduct]);
            }
            elseif((strcmp($request->address_email,$email_current)!=0) && (strcmp($request->name_customer,$name_user)==0)){
                echo "<script>
                    alert('Bạn đã không được thay đổi địa chỉ email : ".$email_current."');
                    window.location='".route('ProductDetail',['idemail'=>$idCustomer,'idproduct'=>$idproduct])."'
                    </script>";
            }
            elseif ((strcmp($request->address_email,$email_current)==0) && (strcmp($request->name_customer,$name_user)!=0)) {
                echo "<script>
                    alert('Bạn đã không được thay đổi tên khách hàng : ".$name_user."');
                    window.location='".route('ProductDetail',['idemail'=>$idCustomer,'idproduct'=>$idproduct])."'
                    </script>";
            }
            else{
                echo "<script>
                    alert('Bạn đã không được thay đổi địa chỉ email và tên user ');
                    window.location='".route('ProductDetail',['idemail'=>$idCustomer,'idproduct'=>$idproduct])."'
                    </script>";
            }
        }
        else{
            // Thêm vào comment chưa đăng nhập , click gửi sẽ hiện thị trang chi tiết
            Session::put('id_detail_product',$idproduct);
            $request->session()->put('commentNoLogin',1);
            return Redirect()->route('getLogin');
        }
    }
}
