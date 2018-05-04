<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdminUserController extends Controller
{
    public function showAllUser(){
    	$users = DB::table('users')->paginate(6);
    	return view('CNW/adminuser')->with('users',$users);
    }

    public function searchUser(Request $request){
    	if($request->ajax()){
	    	$search_user = $request->search_user;
	    	$output ="";
	    	$users = DB::table('users')->where('email','LIKE','%'.$search_user.'%')
	    								->orwhere('address','LIKE','%'.$search_user.'%')->get();
	    	if($users != null){
	    		foreach ($users as $key => $user) {

	    			$avatar = null;
	    			$male = null;
	    			$birth = null;
	    			$name = null; 

	    			$imformation = DB::table('imformations')->where('id_employee',$user->id)->first();

	    			if(isset($imformation)){
	    				if(isset($imformation->avatar)){
	    					$avatar = asset($imformation->avatar);
	    				}else{
	    					$avatar = asset("http://websamplenow.com/30/userprofile/images/avatar.jpg");	
	    				}

	    				if(isset($imformation->male)){
	    					if($imformation->male == 1){
	    						$male = "Male";
	    					}else{
	    						$male = "Female";
	    					}
	    				}

	    				if(isset($imformation->name)){
	    					$name = $imformation->name;
	    				}

	    				if(isset($imformation->birth)){
	    					$birth = $imformation->birth;
	    				}
	    			}	

	    			$output.='<tr>'.
                        '<td>'.$user->id.'</td>'.
                        '<td>'."<img src='$avatar' alt='' class='avatar'>".'</td>'.
                        '<td>'.$name.'</td>'.
                        '<td>'.$user->email.'</td>'.
                        '<td>'.$user->phone.'</td>'.
                        '<td>'.$user->address.'</td>'.
                        '<td>'.$male.'</td>'.
                        '<td>'.$birth.'</td>'.
                    '</tr>';
	    		}
	    		return Response($output);
	    	}								
    	}								
    }
}
