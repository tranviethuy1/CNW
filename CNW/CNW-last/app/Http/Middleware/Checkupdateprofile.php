<?php

namespace App\Http\Middleware;

use Closure;

class Checkupdateprofile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $name = $request->input('name');
        $gender = $request->input('gender');
        $address = $request->input('address');
        $birth = $request->input('birth');
        $phone = $request->input('phone');
        if(empty($name)){
            return redirect()->Route('updateprofile')->with('name','Name is empty');
        }
        if(empty($birth)){
            return redirect()->Route('updateprofile')->with('birth','Birth is empty');
        }
        if(empty($address)){
            return redirect()->Route('updateprofile')->with('address','Address is empty');
        }
        if(empty($phone)){
            return redirect()->Route('updateprofile')->with('phone','Phone is empty');
        }
        if($gender != 1 && $gender != 2){
            return redirect()->Route('updateprofile')->with('gender','Gender is not checked');
        }
        if(!preg_match("/^[0-9]{9}$/", $phone) && !preg_match("/^[0-9]{10}$/", $phone) && !preg_match("/^[0-9]{11}$/", $phone)){
            return redirect()->Route('updateprofile')->with('phone','Phone is invalid format (9-11 number)'); 
        }
        if(!preg_match("/^[0-9]{4}-[0-1][0-9]-[0-3][0-9]$/",$birth)){
            return redirect()->Route('updateprofile')->with('birth','Birth is invalid format (yyyy-mm-dd)');
        }
        return $next($request);
    }
}
