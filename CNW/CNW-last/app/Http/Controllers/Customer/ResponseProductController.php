<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;
use DB;
use Session;
use Validator;

class ResponseProductController extends Controller
{
	public function getContact($idemail){
		$name_email=DB::table('users')->where('id',$idemail)->value('email');
		return view('CNW.contact1')->with('emailCustomer',$name_email);
	}
  public function SendEmail(Request $request){
    // Sent  from the same address
      $data1=$request->all();
      $rule=[
        'fileEmail'=>'required|max:10000000000'
      ];
      $validator=Validator::make($data1,$rule);
      if($validator->fails()){
        return Redirect()->route('Customerfeedback',session('idEmail'))->withErrors($validator);
      }else{
            if(file_exists($request->file('fileEmail'))){
               $data=array(
                 'email'=>$request->address_email,
                 'title'=>$request->title_email,
                 'content'=>$request->content_email,
                 'name'=>$request->name_customer,
                 'file'=>$request->file('fileEmail')
                );
                Mail::send('CNW.ContentMail',$data,function($message) use($data){
                $message->from('nhatvan023@gmail.com','Phạm Hoàn');
                $message->attach($data['file']->getRealPath(),array(
                  'as'=>$data['file']->getClientOriginalName().'.'.$data['file']->getClientOriginalExtension(),
                  'mime'=>$data['file']->getMimeType())
                    );
                $message->to($data['email'],$data['name'])->subject($data['title']);
              });
              echo "<script>
                alert('Cảm ơn bạn đã góp ý . Chúng tôi sẽ liên hệ lại với bạn trong thời gian sớm nhất');
                window.location='".route('Customerfeedback',session('idEmail'))."'
                </script>";
            }
        }
    }
}
