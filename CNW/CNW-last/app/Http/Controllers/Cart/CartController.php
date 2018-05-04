<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Cart;
use App\Product;
class CartController extends Controller
{
	public function showCart(){
		$items = Cart::content();
        $totals = 0;
        foreach($items as $item){
            $totals += $item->qty*$item->price;
        }

		return view('CNW/cart')->with(['contents'=>$items,'totals'=>$totals]);
	}

   public function addToCart(Request $request){

        if(session('Name')!==null)
        {
            $customer = session('Name');
            $product_id=0;
            $product_number=0;
            // Lưu session này
            if(session('brower')!==null){
                $product_id=session('id_product');
                $product_number=session('number_product');
            }
            else{
                $product_id = $request->product_id;
                $product_number = $request->product_number;
            }
            $rowid = null;
            $product=new Product;
            $product = DB::table('product')->where('id',$product_id)->first();

            $product_name = $product->name;
            $product_color = $product->color;
            $product_price = $product->price;

            Cart::add(array('id'=>$product_id,'name'=>$product_name,'qty'=>$product_number,'price'=>$product_price,'options'=>array('color'=>$product_color)));

            return redirect()->Route('showCart');
        }
        else{
            // Thiết lập 1 session để xác định đã xem lướt
            // Sau khi đăng nhập xong lập tức nhảy vào trang cart để add luôn sản phẩm đó
            $product_id=$request->product_id;
            $product_number=$request->product_number;
            $request->session()->put('id_product',$product_id);
            $request->session()->put('number_product',$product_number);
            // Thêm vào cart chưa đăng nhập
            $request->session()->put('brower',1);
            return redirect()->Route('getLogin');
        }
   }

   public function deleteItem(Request $request){
        $rowid = $request->rowid;
        $id = $request->id;

        Cart::remove($rowid);

        DB::table('carts')->where('rowid',$rowid)->where('product_id',$id)->delete();
        return redirect()->Route('showCart');

   }

   public function updateitem(Request $request){
        $rowid = $request->rowid;
        $number = $request->input('number');

        Cart::update($rowid,['qty'=>$number]);
        return redirect()->Route('showCart')->with('alert','update succesful');
   }

   public function payment(Request $request){
        $contents = Cart::content();
        $customer = session('Name');

        if(count($contents) == 0){
            $alert = " Cart is empty";
            return redirect()->Route('showCart')->with('alert',$alert);
        }else{
            foreach($contents as $content){
                $product = \App\Product::find($content->id)->first();

                if($content->qty < $product->number){
                    $rowid = $content->rowId;
                    $value = new \App\Carts;
                    $value->customer = $customer;
                    $value->rowid = $rowid;
                    $value->product_id = $content->id;
                    $value->product_name = $content->name;
                    $value->product_color = $content->options->color; 
                    $value->product_number = $content->qty;
                    $value->product_price = $content->price;
                    $value->create_at =  date("Y-m-d H:i:s");                
                }else{
                    $alert = $content->name.'is not enough';
                    return redirect()->Route('showCart')->with('alert',$alert);
                }
            }

            foreach ($contents as $content) {
                $product = \App\Product::find($content->id)->first();
                
                $rowid = $content->rowId;
                $value = new \App\Carts;
                $value->customer = $customer;
                $value->rowid = $rowid;
                $value->product_id = $content->id;
                $value->product_name = $content->name;
                $value->product_color = $content->options->color; 
                $value->product_number = $content->qty;
                $value->product_price = $content->price;
                $value->create_at =  date("Y-m-d H:i:s"); 
                $value->save();

                $product->number = $product->number - $content->qty;
                $product->save();   
            }

            Cart::destroy();
            return redirect()->Route('showCart')->with('alert','payment succesful');
        }
   }

   public function chooseNumberBills(Request $request){
        $number_page=$request->numberBill;
        session()->put('page_number',$number_page);
        return redirect()->Route('showbills');
   }

   public function showBills(){
        if(!session()->has('page_number')){
            $bills = \App\Carts::orderBy('id','desc')->paginate(9);
            return view('CNW/show_bills')->with('bills',$bills);
        }else{
            $numberBill = session('page_number');
            $bills = \App\Carts::orderBy('id','desc')->paginate($numberBill);
            return view('CNW/show_bills')->with(['bills'=>$bills,'number'=>$numberBill]);
        }
   }

   public function searchBillsAjax(Request $request){
        if($request->ajax()){
            $output ="";
            $search_bill = $request->search_bill;
            $data_search_bill = DB::table('carts')->where('customer','LIKE','%'.$search_bill.'%')
                                         ->orWhere('product_name','LIKE','%'.$search_bill.'%')
                                         ->orWhere('product_color','LIKE','%'.$search_bill.'%')->get();

            if($data_search_bill != null){
                $stt=0;
                foreach ($data_search_bill as $value) {
                    $stt = $stt+1;
                    // Khi đặt trong thẻ trong '' thì truyền cái giá trị của biến zp cho nó , không truyền được sự kiên
                    $output.='<tr>'.
                        '<td>'.$stt.'</td>'.
                        '<td>'.$value->customer.'</td>'.
                        '<td>'.$value->product_id.'</td>'.
                        '<td>'.$value->product_name.'</td>'.
                        '<td>'.$value->product_color.'</td>'.
                        '<td>'.$value->product_number.'</td>'.
                        '<td>'.$value->product_price.'</td>'.
                        '<td>'.$value->create_at.'</td>'.
                        '</tr>';
                }
                // gửi yêu cầu đến server , trái ngược lại so với request
                return Response($output);
            }                             
        }
   }

}
