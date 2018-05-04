<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Illuminate\Support\Facades\Redirect;
class DangKiController extends Controller
{
    public function showRegister(){
        return view('CNW.sign_up');
    }
    public function AddUser(Request $request)
    {
        // validation 
        $formdata=$request->all();
        $rules=[
            // để dùng unique thì phải đặt name trong input trùng tên trong database nhé
            'email'=>'required|email|unique:users',
            'password'=>'required|min:3|max:20',
            're_password_user'=>'required|min:3|max:20|same:password',
            'phone'=>'required',
            'address'=>'required'
        ];
        $message=[
            'email.required'=>'The email file is required  !!!',
            'password.required'=>'The password file is required !!!',
            'phone.required'=>'The phone file is required !!!',
            'address.required'=>'The address file is required !!!'
        ];
        $validator=Validator::make($formdata,$rules,$message);
        if($validator->fails()){
            return Redirect::to('home/login/register')->withErrors($validator);
        }
        else{
            // lưu vào database
            $user=new User;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);
            $user->phone=$request->phone;
            $user->address=$request->address;
            $user->save();
            return Redirect::to('home/login/register')->with('status_register','User had in database ! Insert Success !');           
        }
    }
}
