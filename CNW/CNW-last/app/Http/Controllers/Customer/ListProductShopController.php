<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use DB;
use Session;

class ListProductShopController extends Controller
{
    public function listProductShop($mau){
    	// ý tưởng : Đếm số thể loại và liệt kê ra tên tất cả thể loại . hoản toàn sử dụng mảng thay vì session
        if (Session::has('brower'))
        {
            Session::forget('brower'); 
        } 
        $array_type=array(
          // Sử dụng pluck() thay lists() , value() no
          $number_type_product=DB::table('product')->distinct()->count('type'),
	      $name_type_product=DB::table('product')->distinct()->pluck('type')
        );
        Session::put('array_type_product',$array_type);
        /*if(!Session::has('Name')){
           Session::put('idEmail',0);
        }*/
        // Lấy toàn bộ dữ liệu
        $color_product="listProduct";
    	switch ($mau) {
    		case 'White':
    			$color_product='White';
    			break;
    		case 'Yellow':
    			$color_product='Yellow';
    			break;
			case 'Orange':
				$color_product='Orange';
				break;
			case 'Blue':
    			$color_product='Blue';
    			break;
    		case 'Green':
    			$color_product='Green';
    			break;
    		case 'Purple':
    			$color_product='Purple';
    			break;
    		case 'Gray':
    			$color_product='Gray';
    			break;
    		case 'Red':
    			$color_product='Red';
    			break;
			case 'ALL':
			$color_product='ALL';
			    break;						
    		default:
			$color_product="";
			    break;
    	}
    	if(strcmp($color_product, "ALL")==0){
            $data=array();
	        for($i=0;$i<$number_type_product;$i++){
	            $data1=DB::table('product')->where('type',$name_type_product[$i])->get();
	            $data[]=$data1;
	        }
	        return view('CNW.shop')->with('data_content_session',$data);
    	}
    	else{
    		$data=array();
	        for($i=0;$i<$number_type_product;$i++){
	            $data1=DB::table('product')->where('type',$name_type_product[$i])
	                                       ->where('color',$color_product)->get();
	            $data[]=$data1;
	        }
	        return view('CNW.shop')->with('data_content_session',$data);
    	}
    }
    public function checkNameProduct($nameproduct){
          $alldata=DB::table('product')->get();
          foreach ($alldata as $product) {
              if(strcmp($product->name, $nameproduct)){
                return 1;
              }
          }
          return 0;
    }
    public function SearchProductShop(Request $request)
    {
        // ý tưởng phân chia sao cho k bị xuống dòng
         if($request->ajax())
        {
            $output="";
            $temp=0;
            $temp=$this->checkNameProduct($request->search_product_shop);
            $key='Quick View';
            // Tìm kiếm theo Tên hay Thể loại đây
            $type_search=DB::table('product')->where('type','LIKE','%'.$request->search_product_shop.'%')
                                             ->orwhere('name','LIKE','%'.$request->search_product_shop.'%')
                                             ->distinct()->pluck('type');
            $number_search=DB::table('product')->where('type','LIKE','%'.$request->search_product_shop.'%')
                                             ->orwhere('name','LIKE','%'.$request->search_product_shop.'%')
                                             ->distinct()->count('type');                           
            if($type_search!=null){
                // Dùng foreach không được buộc phải dùng for đối với distinct() và pluck()
                for($i=0;$i<$number_search;$i++) {
                    $output.=
                            "<div class='col-lg-12 title_product form-control' style='margin-top: 10px;'>"
                                ."<span style='color: blue'>".$type_search[$i]."</span>"
                            ."</div>";
                    if($temp==1){
                        $same_product_type=DB::table('product')->where('type','LiKE','%'.$type_search[$i].'%')->where('name','LIKE','%'.$request->search_product_shop.'%')->get();
                    }
                    else{
                        $same_product_type=DB::table('product')->where('type','LiKE','%'.$type_search[$i].'%')->get();
                    }
                    foreach ($same_product_type as $value2) {
                        $img=asset($value2->image);
                        $show1=url('shop/product_detail',$value2->id);
                        $output.="<div class='col-lg-3 col-md-6 Casies--item'>".
                                "<a href='$show1'>".
                                    "<img src='$img' class='img-fluid'/>".
                                    "<div class='Casies--item__view'>".$key."</div>".
                                "</a>".
                                "<div class='Casies--item__in4'>".
                                    "<p class='__in4--title'>".$value2->name."</p>".
                                    "<div>".
                                        "<span class='__in4--cose'>".$value2->price."</span>".
                                    "</div>".
                                "</div>".                          
                            "</div>";
                    }
                }
            }
            $output="<div class='row'>".$output."</div>";
            return Response($output); 
        }
    }
}
