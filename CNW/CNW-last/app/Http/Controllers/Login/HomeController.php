<?php

namespace App\Http\Controllers\Login;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{
	// Lỗi là do đặt tên 2 route get trùng nhau
    public function BackHome1(Request $request){
    	$request->session()->flush();
    	if(!Session::has('Name')){
           Session::put('idEmail',0);
        }
        $product_new=DB::table('product')->orderBy('id','desc')->take(5)->get();
        return view('CNW.home')->with('newProduct',$product_new);
    }
    public function BackHome(Request $request){
        $product_new=DB::table('product')->orderBy('id','desc')->take(5)->get();
        return view('CNW.home')->with('newProduct',$product_new);
    }
}
