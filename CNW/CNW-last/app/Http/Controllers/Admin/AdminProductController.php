<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use Validator;
use Illuminate\Support\Facades\Redirect;
use DB;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    // Hiện thi view add Product
    public function getAddProduct(){
    	return view('CNW.addProduct');
    }
    public function getListProduct(){
    	return view('CNW.listProduct');
    }
    public function getEditProduct(){
    	return view('CNW.editProduct');
    }
    public function getLogoutAdmin(Request $request){
        // hủy session
        // Huy Auth phân quyền để sau mỗi lần admin thoát không bị lưu dữ liệu ->deleteAll
        Auth::logout();
        $request->session()->forget('pages');
        return Redirect()->route('backHome1');
    }
     public function getLogoutCustomer(Request $request){
        return Redirect()->route('backHome1');
    }
    // Hàm xử lí tên trùng khi nhập vào cùng 1 sản phẩm cùng loại : miêu tả , giới thiệu giống nhau 
    public function getValidateProduct($nameProduct,$descriptionProduct,$introduceProduct)
    {
        // thực hiện câu lệnh truy vấn
        // Sử dụng first() thay vì get() : get() lấy hết , first(): lấy giá trị đầu
       $same_product=DB::table('product')->select('name','description','introduce')->where('name',$nameProduct)->first();
       if($same_product!=null){
            if((strcmp($same_product->description, $descriptionProduct)==0)&&(strcmp($same_product->introduce, $introduceProduct)==0)&&$same_product!=null){
                // dùng mảng
                $array_result_same_product=array(1,array($same_product->description,$same_product->introduce));
            }
            else{
                $array_result_same_product=array(0,array($same_product->description,$same_product->introduce));
            }
            return $array_result_same_product;
       }
       else{
            return null;
       }
    }
    // thêm sản phẩm
    public function postAddProduct(Request $request){
    	// validate data
        // Định dạng cho kiểu name : Tên typeTên chi tiết 
    	$data_product=$request->all();
    	$rule=[
    		'type_product'=>'required',
    		'name_product'=>'required',
    		'price_product'=>'required',
    		'color_product'=>'required',
    		'introduce_product'=>'required',
    		'description_product'=>'required',
    		'image'=>'required|image|max:1000'
    	];
    	$message=[
    		'type_product.required'=>"You must insert type's product ",
    		'name_product.required'=>"You must insert name's product ",
	    	'price_product.required'=>"You must insert price's product ",
	    	'content_product.required'=>"You must insert content's product ",
	    	'color_product.required'=>"You must insert color's product ",
	    	'description_product.required'=>"You must insert description's product "
    	];
    	$validator=Validator::make($data_product,$rule,$message);
    	if($validator->fails()){
    		return Redirect::to('get_add_product')->withErrors($validator);
    	}else{
    		// insert data
    		$value_radio=$request->radio_product;
    		if($value_radio==1){
                // yêu cầu : mã hóa toàn bộ type and name về dạng in hoa
    			$img=$request->file('image');
    			$img_name=$img->getClientOriginalName();
    			$img_path="uploads"."/".$img_name;
    			$product=new Product;
                // format uppercase
                $product->price=$request->price_product;
                $product->color=$request->color_product;
                $product->introduce=$request->introduce_product;
                $product->description=$request->description_product;
                $product->number=$request->number_product;
                $product->image=$img_path;
    			$product->type=strtoupper($request->type_product);
                $long_product_type=strlen($product->type);
    			$product->name=strtoupper($request->name_product);
                $product_name_temp=substr($product->name, 0,$long_product_type);
                // Nếu kết quả nhập vào đã có trong cơ sở dữ liệu tap chỉ cần tăng số lượng sản phẩm lên la ok
                $data_same_product=DB::table('product')->where('type',strtoupper($request->type_product))
                                                       ->where('name',strtoupper($request->name_product))
                                                       ->where('color',$request->color_product)->first();                                                    
                // so sánh chuỗi
                if(strcmp($product_name_temp, $product->type)==0){
                    $array_temp=$this->getValidateProduct($product->name,$product->description,$product->introduce);
                    if($array_temp!=null){
                        if($array_temp[0]==1){
                            if ($data_same_product!=null) {
                                $total_number_product=$data_same_product->number+$request->number_product;
                                $add_number_product=array(
                                    'price'=>$request->price_product,
                                    'number'=>$total_number_product,
                                    'image'=>$img_path
                                );
                                $des="uploads";
                                $img->move($des,$img_path);
                                // chỉ tăng số lượng sản phẩm
                                $product->where('id',$data_same_product->id)->update($add_number_product);
                                return Redirect::to('home/admin/add')->with('status_add_product','Add product Success !');
                            }
                            else{
                                $product->save();
                                $des="uploads";
                                $img->move($des,$img_path);
                                return Redirect::to('home/admin/add')->with('status_add_product','Add product Success !');
                            }
                        }
                        else{
                            return Redirect::to('home/admin/add')->with(['erro_description'=>'Fail and Requirement is :'.$array_temp[1][0],'erro_introduce'=>'Fail and Requirement is :'.$array_temp[1][1]]);
                        }
                    }
                    else{

                        $product->save();
                        $des="uploads";
                        $img->move($des,$img_path);
                        return Redirect::to('home/admin/add')->with('status_add_product','Add product success !');
                    }
                }
                else{
                    return Redirect::to('home/admin/add')->with('erro_format_name','Tên sản phẩm = Tên thể loại + Kí tự thêm ');
                }
    		}
    		else{
    			return Redirect::to('home/admin/add')->with('status_add_product','Add product failed !');
    		}
    	}
    }
    public function pageProduct(Request $request){
         $number_page=$request->numberProduct;
         $request->session()->put('pages',$number_page);
         // khi mày sử dụng Redirect::to cũng có session những khi load lại trang là mất
         return Redirect::to('home/admin/list');
    }
    // list data to table
    // Khi bạn click vào số trang thì nó mất đi session
    public function listProduct(){
        if(session('pages')){
            $pages=session('pages');
            $list_product=DB::table('product')->paginate($pages);
        }
        else{
            $list_product=DB::table('product')->paginate(2);
        }
        if(DB::table('product')->count() > 0 ){
            return view('CNW.listProduct')->with('product1',$list_product);
        }
        else{
            return view('CNW.listProduct')->with('product1',0);
        }
    }
    // get data when update
    public function EditProduct($id){
        $update_data_product=DB::table('product')->where('id',$id)->first();
        return view('CNW.editProduct')->with('DataUpdateProduct',$update_data_product);
    }
    // update data in table
    public function UpdateProduct(Request $request,$id){
        $product_type=strtoupper($request->edit_type_product);
        $long_product_type=strlen($product_type);
        $product_name=strtoupper($request->edit_name_product);
        $product_name_temp=substr($product_name, 0,$long_product_type);
        if(strcmp($product_name_temp, $product_type)==0){
            $edit_product=new Product;
            //  $request->hasFile('ten name') : true or false
            //  Tên sản phẩm phải bằng type+ kí tự
            if(file_exists($request->file('fImages'))){
                $new_img=$request->file('fImages');
                $new_img_name=$new_img->getClientOriginalName();
                $new_img_path="uploads"."/".$new_img_name;
                // Đẩy nó vào thư mục
                $des="uploads";
                $new_img->move($des,$new_img_name);
            }
            else{
                $old_img_path=DB::table('product')->where('id',$id)->value('image');
                $new_img_path=$old_img_path;
            }
            $update_data_product1=array
            (
                'type'=>strtoupper($request->edit_type_product),
                'name'=>strtoupper($request->edit_name_product),
                'introduce'=>$request->edit_introduce_product,
                'description'=>$request->edit_description_product,
                'color'=>$request->edit_color_product,
                'number'=>$request->edit_number_product,
                'price'=>$request->edit_price_product,
                'image'=>$new_img_path
            );
            // the same path image
            $old_img_path=DB::table('product')->where('id',$id)->value('image');
            $update_data_product3=array
            (
                'name'=>strtoupper($request->edit_name_product),
                'introduce'=>$request->edit_introduce_product,
                'description'=>$request->edit_description_product
            );
            $product_name=DB::table('product')->where('name',$request->edit_name_product)->first();
            if($product_name!=null)
            {
                // update multiple
                // Different name auto update different introduce and different description. ok
                $edit_product->where('name',$request->edit_name_product)->update($update_data_product3);
                $edit_product->where('id',$id)->update($update_data_product1);  
            }
            else{
                    $edit_product->where('id',$id)->update($update_data_product1);
            }
            return Redirect::to('home/admin/list')->with('status_update_product',array('Cập nhật thành công sản phẩm ',''.$request->edit_name_product.' có màu '.strtoupper($request->edit_color_product) ));

        }
        else{
            return Redirect()->route('getEditProduct',['id' => $id])->with('erro_format_name1','Tên sản phẩm = Tên thể loại + Kí tự thêm ');
        }
    }
    // Delete data in table
    public function DeleteProduct($id){
       DB::table('product')->where('id',$id)->delete();
       return Redirect::to('home/admin/list')->with('status_delete_product','Xóa thành công !');
    }
    // search data in table
    public function searchProduct(Request $request){
        if($request->ajax())
        {
            $output="";
            $data_search=DB::table('product')->where('type','LIKE','%'.$request->search_product.'%')
                                         ->orWhere('name','LIKE','%'.$request->search_product.'%')
                                         ->orWhere('price','LIKE','%'.$request->search_product.'%')
                                         ->orWhere('color','LIKE','%'.$request->search_product.'%')->get();
            if($data_search!=null){
                $stt=0;
                foreach ($data_search  as $value1) {
                    $stt++;
                    // Khi đặt trong thẻ trong '' thì truyền cái giá trị của biến zp cho nó , không truyền được sự kiên
                    $img=asset($value1->image);
                    $show1=route('getEditProduct',$value1->id);
                    $show2=route('deleteProduct',$value1->id);
                    $output.=  '<tr>'.
                               '<td>'.$stt.'</td>'.
                               '<td>'.$value1->type.'</td>'.
                               '<td>'.$value1->name.'</td>'.
                               '<td>'.$value1->introduce.'</td>'.
                               '<td>'.$value1->description.'</td>'.
                               '<td>'.$value1->price.'</td>'.
                               '<td>'.$value1->number.'</td>'.
                               "<td>"."<img src='$img' style='width: 120px; height: 120px;'>"."</td>".
                               '<td>'.$value1->color.'</td>'.
                               "<td>"."<a href='$show1' class='btn btn-danger'>Edit</a>"."</td>".
                               "<td>"."<a href='$show2' class='btn btn-success'>Delete</a>"."</td>".
                                '</tr>';
                }
                // gửi yêu cầu đến server , trái ngược lại so với request
                return Response($output);
            }  
        }
    }
}
