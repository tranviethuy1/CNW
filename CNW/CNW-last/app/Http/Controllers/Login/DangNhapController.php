<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class DangNhapController extends Controller
{
    public function showLogin(){
        return view('CNW.login');
    }
    public function login(Request $request)
    {
        $email_login=$request['email_login'];
        $password_login=$request['password_login'];
        $phone_login=User::where('email',$email_login)->value('phone');
        $address_login=User::where('email',$email_login)->value('address');
        $level=User::where('email',$email_login)->value('level');
        $id_email=User::where('email',$email_login)->value('id');
        $email_admin=User::where('level',1)->value('email');
        if(Auth::attempt(['email'=>$email_login,'password'=>$password_login,'phone'=>$phone_login,'address'=>$address_login]))
        {
            // xét điều kiện để đăng nhập thành công
            $request->session()->put('Name',$email_login);
            $request->session()->put('idEmail',$id_email);
            // Session('brower') sinh ra
            if(session('brower')!==null)
            {
              // Chưa đăng nhập thì idEamil=0;
              return Redirect()->route('addtocart');
            }
            else{
                if(session('commentNoLogin')==null)
                {
                    if($level==1)
                    {
                       return Redirect()->route('listProduct');
                    }
                       return Redirect()->route('listShopProduct',['mau'=>'ALL']);
                }
                else{
                    return Redirect()->route('ProductDetail',['idemail'=>session('idEmail'),'idproduct'=>session('id_detail_product')]);
                }
           }
        }
        else{
            return Redirect::to('home/login')->with('status_login', 'You dont have account or failed password or name account ! ');
        }
    }
}
