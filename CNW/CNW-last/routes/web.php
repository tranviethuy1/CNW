<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// home
// no same name route get
Route::get('home',['as'=>'backHome','uses'=>'Login\HomeController@BackHome']);
Route::get('home1',['as'=>'backHome1','uses'=>'Login\HomeController@BackHome1']);
//
Route::get('home/logout',['as'=>'logoutCustomer','uses'=>'Admin\AdminProductController@getLogoutCustomer']);
// Logout admin
Route::get('home/admin/logout',['as'=>'logoutAdmin','uses'=>'Admin\AdminProductController@getLogoutAdmin']);
Route::get('contact',function(){
	return view('CNW.contact');
});
// send gmail to all customers
/*Route::get('shop/feedback/{idemail}',['as'=>'Customerfeedback','uses'=>'Customer\ResponseProductController@getContact']
);
Route::post('shop/feedback',['as'=>'SendEmail','uses'=>'Customer\ResponseProductController@SendEmail']);*/
// product detail
Route::get('product_detail',function(){
	return view('CNW.product_detail');
});
// Login and register
Route::get('home/login/register',['as'=>'get_sign','uses'=>'Login\DangKiController@showRegister']);
Route::post('home/login/register',['as'=>'post_sign','uses'=>'Login\DangKiController@AddUser']);
Route::get('home/login',['as'=>'getLogin','uses'=>'Login\DangNhapController@showLogin']);
Route::post('home/login',['as'=>'postLogin','uses'=>'Login\DangNhapController@login']);
Route::get('home/login/changePassword',['as'=>'get_change_pww','uses'=>'Login\ChangePasswordController@showChangePassword']);
Route::post('home/login/changePassword',['as'=>'changePassword','uses'=>'Login\ChangePasswordController@changePasswordCustomer']);
// admin
Route::get('home/admin/list',['as'=>'listProduct','uses'=>'Admin\AdminProductController@listProduct','middleware'=>'adminLogin']);
// number page
Route::post('home/admin/list',['as'=>'pageProduct','uses'=>'Admin\AdminProductController@pageProduct','middleware'=>'adminLogin']);
// add product
Route::get('home/admin/add',['as'=>'getAddProduct','uses'=>'Admin\AdminProductController@getAddProduct','middleware'=>'adminLogin']);
Route::post('home/admin/add',['as'=>'postAddProduct','uses'=>'Admin\AdminProductController@postAddProduct','middleware'=>'adminLogin']);
// edit product
Route::get('home/admin/edit/{id}',['as'=>'getEditProduct','uses'=>'Admin\AdminProductController@EditProduct','middleware'=>'adminLogin']);
Route::post('home/admin/edit/{id}',['as'=>'postEditProduct','uses'=>'Admin\AdminProductController@UpdateProduct','middleware'=>'adminLogin']);
// delete product
Route::get('home/admin/delete/{id}',['as'=>'deleteProduct','uses'=>'Admin\AdminProductController@DeleteProduct','middleware'=>'adminLogin']);
// search data in admin
Route::get('home/admin/search',['as'=>'searchProduct','uses'=>'Admin\AdminProductController@searchProduct','middleware'=>'adminLogin']);
// Customer
Route::get('login','Customer\CustomerLoginController@getLoginCustomer');
// Shopping
Route::get('shop/color/{mau}',['as'=>'listShopProduct','uses'=>'Customer\ListProductShopController@listProductShop']);
// Search product shop
Route::get('shop/search',['as'=>'searchShopProduct','uses'=>'Customer\ListProductShopController@SearchProductShop']);
// Detail Product
Route::get('shop/product_detail/{idemail}/{idproduct}',['as'=>'ProductDetail','uses'=>'Customer\DetailProductController@getDetailProduct']);
// Comment product
Route::post('shop/comment/{idproduct}/{idemail}',['as'=>'CommentProduct','uses'=>'Customer\CommentProductController@SaveComment']);
// Cart product
Route::get('cart',function(){
	return view('CNW/cart');
})->name('cart');

Route::get('addtocart','Cart\CartController@addToCart')->name('addtocart');

Route::get('showCart','Cart\CartController@showCart')->name('showCart');

Route::get('deleteitem/{rowid}/{id}','Cart\CartController@deleteItem')->name('deleteitem');

Route::get('updateitem/{rowid}','Cart\CartController@updateItem')->name('updateitem');

Route::get('payment','Cart\CartController@payment')->name('payment');

Route::get('showbills','Cart\CartController@showBills')->name('showbills');

Route::post('choosebills','Cart\CartController@chooseNumberBills')->name('choosebills');

Route::get('searchbills','Cart\CartController@searchBillsAjax')->name('searchbills');

Route::get('profile','Customer\ExcuteAccount@showProfile')->name('profile');

Route::get('updateprofile','Customer\ExcuteAccount@redirectUpdateProfile')->name('updateprofile');

Route::post('excuteupdateprofile','Customer\ExcuteAccount@excuteUpdate')->name('excuteupdateprofile')->middleware('checkupdateprofile');

Route::get('showallusers','Admin\AdminUserController@showAllUser')->name('showallusers');

Route::get('searchusers','Admin\AdminUserController@searchUser')->name('searchusers');

