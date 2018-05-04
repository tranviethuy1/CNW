<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ExcuteAccount extends Controller
{
    public function showProfile(){
    	if(session()->has('Name')){
	    	$email = session('Name');
	    	$value = array();
	    	$user = DB::table('users')->where('email',$email)->first();
	    	$imformation = DB::table('imformations')->where('id_employee',$user->id)->first();

	    	return view('CNW/profile')->with(['user'=>$user,'imformation'=>$imformation]);
    	}else{
    		return redirect()->route('getLogin');
    	}
    }

    public function redirectUpdateProfile(){
    	if(session()->has('Name')){
	    	$email = session('Name');
	    	$value = array();
	    	$user = DB::table('users')->where('email',$email)->first();
	    	$imformation = DB::table('imformations')->where('id_employee',$user->id)->first();

	    	return view('CNW/updateprofile')->with(['user'=>$user,'imformation'=>$imformation]);
	    }else{
	    	return redirect()->route('getLogin');
	    }	
    }

    public function excuteUpdate(Request $request){
        $email = session('Name');

        $name = $request->input('name');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $birth = $request->input('birth');
        $phone = $request->input('phone');

        $userUpdate = \App\User::where('email',$email)->first();
        
        $userUpdate->phone = $phone;
        $userUpdate->address = $address;

        $imforUpdate = \App\Imformations::where('id_employee',$userUpdate->id)->first();

        if($imforUpdate == null){
        	//truong hop chua ton tai thong tin ca nhan 
        	$imfo = new \App\Imformations();
        	$imfo->male = $gender;
        	$imfo->name = $name;
        	$imfo->birth = $birth;
        	$imfo->id_employee = $userUpdate->id;
	       	if($request->hasFile('avatar')){
	            $file = $request->file('avatar');

	            if(in_array($file->getClientOriginalExtension(),['png','jpg','jpeg'])){
	                $photo_name = $file->getClientOriginalName();
	                $link = "avatars/";
	                $file->move($link,$photo_name);
	                $imfo->avatar = $link.$photo_name;
	                
	                $userUpdate->save();
	                $imfo->save();
	                return redirect()->Route('updateprofile')->with('alert','Update succesful');
	            }else{
	                return redirect()->Route('updateprofile')->with('alert','Invalid format file or Size of file is too big');
	            }
	        }else{
	            $userUpdate->save();
	            $imfo->save();
	            return redirect()->Route('updateprofile')->with('alert','Update succesful');
	        }
        }else{
        	//truong hop ton tai thong tin ca nhan roi
        	$imforUpdate->male = $gender;
        	$imforUpdate->name = $name;
        	$imforUpdate->birth = $birth;
        	if($request->hasFile('avatar')){
	            $file = $request->file('avatar');

	            if(in_array($file->getClientOriginalExtension(),['png','jpg','jpeg'])){
	                $photo_name = $file->getClientOriginalName();
	                $link = "avatars/";
	                $file->move($link,$photo_name);
	                $imforUpdate->avatar = $link.$photo_name;
	                
	                $userUpdate->save();
	                $imforUpdate->save();
	                return redirect()->Route('updateprofile')->with('alert','Update succesful');
	            }else{
	                return redirect()->Route('updateprofile')->with('alert','Invalid format file or Size of file is too big');
	            }
	        }else{
	            $userUpdate->save();
	            $imforUpdate->save();
	            return redirect()->Route('updateprofile')->with('alert','Update succesful');
	        }
        }
    }


}
