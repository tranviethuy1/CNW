<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Hash;
use Illuminate\Support\Facades\Redirect;
class ChangePasswordController extends Controller
{
    public function showChangePassword(){
        return view('CNW.ChangePassword');
    }
    public function changePasswordCustomer(Request $request){
        $customer_account=new User;
        $key=0;
        $data_update=array(
            'email'=>$request->email_logined,
            'password'=>bcrypt($request->new_password_login)
        );
        // Rằng địa chỉ của admin cấm thay đổi nhé
        // brypt cùng 1 giá trị string băm ra các hashing khác nhau
        // Điều kiện nhập là ít nhất 6 kí tự
        $user_current=DB::table('users')->where('email',$request->email_logined)->first();
        $list_email_logined=DB::table('users')->where('level',0)->get();
        $password_input=$request->current_password_login;
        foreach ($list_email_logined as $value) {
            if(strcmp($value->email,$request->email_logined)==0){
                if(Hash::check($password_input,$user_current->password)){
                    $key=1;
                }
                else{
                    $key=2;
                }
            }
        }
        if($key==1){
           $customer_account->where('email',$request->email_logined)->update($data_update);
           return Redirect::to('home/login/changePassword')->with('status_change_password','Change password success');
        }
        elseif ($key==2) {
            return Redirect::to('home/login/changePassword')->with('status_change_password_failed',"Past password no corrent ");
        }
        else{
            return Redirect::to('home/login/changePassword')->with('status_change_password_failed','You dont have this account ! Please , register my account !');
        }       
    }
}
