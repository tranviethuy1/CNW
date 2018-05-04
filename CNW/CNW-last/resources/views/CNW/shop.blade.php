<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- font family-->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300&amp;subset=vietnamese" rel="stylesheet">	

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="{!! asset('Font-awesome/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css')!!}">
	<!-- boostrap -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css')!!}">

	<script src="{!! asset('js/jquery-slim.min.js')!!}"></script>
	<script src="{!! asset('js/popper.min.js')!!}"></script>
	<script src="{!! asset('js/bootstrap.min.js')!!}"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="{!! asset('js/owl.carousel.min.js')!!}"></script>
	<!-- jquery -->


	<!-- my css and js -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/owl.carousel.min.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/headandfoot.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/ShopC.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/user.css')!!}">

</head>
<body>
	<header>
		<div class="heading">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 ">
						<div class="heading--logo __logo">
							<a href="#">
								<img src="{!! asset('IMG/logo.gif')!!}" class="img-fluid">
							</a>
							<div class="heading--title __title">
								<a href="home.html">Casies</a>
							</div>

						</div>
						<div class="btn--navbar float-right">
  							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    							<span class="btn--icon fas fa-bars"></span>
  							</button>
						</div>
					</div>
					<div class="col-lg-7 headring--nav">
						<nav class="navbar navbar-expand-lg ">							
  							<div class="collapse  navbar-collapse" id="navbarNav">
    							<ul class="navbar-nav ml-auto">
    								<li class="nav-item active">
        								<a class="nav-link" href="{!! url('home')!!}">Home</a>
      								</li>
    								<li class="nav-item">
										<!-- Xử lí sao cho người đó vẫn có thể vào shop nhé -->
										<a class="nav-link link-child" href="{!! url('shop/color','ALL')!!}">Shop</a>
									</li>
      								<li class="nav-item">
        								<a class="nav-link" href="{!! url('contact')!!}">Contact</a>
      								</li>
      								@if(!session()->has('Name')) 
      								<li class="nav-item">
        								<a class="nav-link" href="{!! route('getLogin') !!}">Login</a>
      								</li>
      								@endif
      								<li class="nav-item">
										<a class="nav-link" href="{!! Route('showCart')!!}">My cart</a>
									</li>
									@if(session()->has('Name')) 	 								
      								<li class="nav-item">
        								<div class="btn-group" role="group">
    										<button id="btnGroupDrop1" type="button" class="btn btn-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      											<i class="fas fa-user-circle"></i>
    										</button>
    										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
<!--     											<span class="dropdown-item" href="#">
	    											@if(session('Name'))
													<span style="color: blue">
														Email:
													</span>
													<div>
														{!! session('Name') !!}
													</div>
													@endif
											    </span> -->
      											<a class="dropdown-item" href="{!! url('profile') !!}">Profile</a>
      											<a class="dropdown-item" href="{!! url('updateprofile') !!}">Update Profile</a>
      											<a class="dropdown-item" href="{!! route('get_change_pww') !!}">Change Password</a>
      											<a class="dropdown-item" href="{!! route('logoutCustomer')!!}">Log out</a>
    										</div>
  										</div>
      								</li>
      								@else
      								<li class="nav-item cart">
        								<a class="nav-link" href="">
											<i class="fas fa-shopping-bag"></i>
        								</a>
      								</li>
      								@endif
    							</ul>
  							</div>

						</nav>
					</div>
				</div>
				<!--<div class="row">
					<span class="" >
						@if(session('Name'))
						<span style="color: blue">
							{!! session('Name') !!}
						</span>
						@endif
				    </span>
				</div>-->				
			</div>			
		</div>
	</header>
	<div class="Casies">
		<div class="container">

			<div class="row">
				<script type="text/javascript">
				    	$(document).ready(function(){
				    		$('.text_search #search').on('keyup',function(){
				    			$value=$(this).val();
				    			$.ajax({
				    				type:'get',
				    				url :"{!! url('shop/search') !!}",
				    				data: {
                                      'search_product_shop':$value   
				    				},
				    				success:function(data){
				    					$('.Casies--List #content_search').html(data);
				    					
				    				}
				    			});
				    		});
				    	});
				    </script> 
				<div class="col-md-12 search_product">
					<div class="row">
						<div class="col-md-3">
							<span></span>
						</div>
                        <div class="col-md-8 ">
                    		<div class="form-group row">
                				<div class="col-sm-10 text_search">
                					<input type="text"  name="search_product_shop" id="search" class="form-control" placeholder="Search something" style="border: 1px solid #007bff;">
                				</div>
                				<div class="col-sm-2 submit_search" >
                					<button type="submit"><i class="fa fa-search"  "></i></button>
                				</div>
                    		</div>
                        </div>
                        <div class="col-md-1">
                        	<span></span>
                        </div>
					</div>
				</div>
				<div class="col-md-3 Casies--shopby">
					<div class="ShopBy__title">
						<h2>Shop by</h2>
					</div>
					<div class="ShopBy__color">
						<h4>Color</h4>
						<div class="color--arrow">
							<i class="icon1 fas fa-minus"></i>
							<i class="icon2 fas fa-plus d-none"></i>
						</div>
					</div>
					<div class="ShopBy__button">
						<ul class="color-filter-container">
								<li class="color-selection color-1">
									<a href="{!! url('shop/color','Blue') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
								<li class="color-selection color-2">
									<a href="{!! url('shop/color','Yellow') !!}"><span style="opacity: 0">Vàng</span></a>
								</li>
								<li class="color-selection color-3">
									<a href="{!! url('shop/color','Red') !!}"><span style="opacity: 0">Vàng</span></a>
								</li>
								<li class="color-selection color-4">
									<a href="{!! url('shop/color','Green') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
								<li class="color-selection color-5">
									<a href="{!! url('shop/color','Orange') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
								<li class="color-selection color-6">
									<a href="{!! url('shop/color','Purple') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
								<li class="color-selection color-7">
									<a href="{!! url('shop/color','Gray') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
								<li class="color-selection color-8">
									<a href="{!! url('shop/color','White') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
								<li class="color-selection color-9">
									<a href="{!! url('shop/color','ALL') !!}"><span style="opacity: 0">Lục</span></a>
								</li>
						</ul>
					</div>
					<!--<div class="ShopBy__filter">
						<h4>
							Custom filter
						</h4>
						<div class="checkbox">
							<div class="checkbox__option">
								<input type="checkbox" aria-label="Checkbox for following text input">
								<span>Cake</span>
							</div>
							<div class="checkbox__option">
								<input type="checkbox" aria-label="Checkbox for following text input">
								<span>Quote</span>
							</div>
							<div class="checkbox__option">
								<input type="checkbox" aria-label="Checkbox for following text input">
								<span>Emotion</span>
							</div>
						</div>
					</div>-->
				</div>
				<div class="col-md-9 Casies--List">
					<div class="row" id="content_search">
						<?php
						   $data_type_session=array();
						   if(Session::has('array_type_product')){
                                $data_type_session=Session::get('array_type_product');
						   }
                           $number_type=$data_type_session[0];
                           $content_type=$data_type_session[1];
						?>
						@if(Session::has('array_type_product'))
						   @for($i=0;$i<$number_type;$i++)
						        <div class="col-lg-12 title_product form-control" style="margin-top: 10px; border-radius: 30px; border: 1px solid #007bff; ">
									<span style="color: #007bff;">
										{!! $content_type[$i] !!}
									</span>
								</div>
								@foreach($data_content_session[$i] as $value)
								    <div class="col-lg-3 col-md-6 Casies--item">
										<a href="{!! url('shop/product_detail',['idemail'=>session('idEmail'),'idproduct'=>$value->id]) !!}">
											<img src="{!! asset($value->image) !!}" class="img-fluid"/>
											<div class="Casies--item__view">
												Quick View
											</div>											
										</a>
										<div class="Casies--item__in4">
												<p class="__in4--title">
													{!! $value->name !!}
												</p>
												<div>
													<span class="__in4--cose">
														{!! $value->price !!}$
													</span>
												</div>
										</div>							
									</div>
								@endforeach
						    @endfor		
						@endif						
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer>	
		<div class="container">
			<div class="row">
				<div class="col-sm-3 footer--phone">
					<p>
						Customer Service:
					</p>
					<div>
						123-456-7890
					</div>
				</div>
				<div class="col-sm-3 footer--list">
					<ul>
						<li>
							<a href="">Shop</a>
						</li>
						<li>
							<a href="">Shipping & Return</a>
						</li>
						<li>
							<a href="">Contact</a>
						</li>
					</ul>
				</div>
                <!-- Xử lí màu khi click vào màu khác nhau thì load các màu khác của iphone và samsung -->
				<div class="col-sm-6 footer--infor">
					<div class="footer--social">
						<ul>
							<li class="social--item">
								<a href="https://twitter.com/">
									<i class="fab fa-twitter"></i>
								</a>
							</li>
							<li class="social--item">
								<a href="https://www.instagram.com/">
									<i class="fab fa-instagram"></i>
								</a>
							</li>
							<li class="social--item">
								<a href="https://www.google.com.vn/">
									<i class="fab fa-google-plus-g"></i>
								</a>
							</li>
							<li class="social--item">
								<a href="https://www.facebook.com/">
									<i class="fab fa-facebook-f"></i>
								</a>
							</li>

						</ul>
					</div>	

					<div class="footer--made">
						<p>
							Mobile Case Shop. Made by 60 Củ
						</p>
					</div>
				</div>
			</div>
		</div>
	
	</footer>
	<script type="text/javascript" src="{!! asset('js/shop.js')!!}"></script>
</body>
</html>