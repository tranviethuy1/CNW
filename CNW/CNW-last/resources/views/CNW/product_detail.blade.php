<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Mobile Case</title>
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
		<link rel="stylesheet" type="text/css" href="{!! asset('css/headandfoot.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/product.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/user.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/shop.css')!!}">
		<link href="https://fonts.googleapis.com/css?family=Gamja+Flower" rel="stylesheet">

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
	      								@if(session()->has('Name'))
										<li class="nav-item">
	        								<div class="btn-group" role="group">
	    										<button id="btnGroupDrop1" type="button" class="btn btn-user dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	      											<i class="fas fa-user-circle"></i>
	    										</button>
	    										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
	    											<a class="dropdown-item" href="{!! url('profile') !!}">Profile</a>
	      											<a class="dropdown-item" href="{!! url('updateprofile') !!}">Update Profile</a>
	      											<a class="dropdown-item" href="{!! route('get_change_pww') !!}">Change Password</a>
	      											<a class="dropdown-item" href="{!! url('home')!!}">Log out</a>
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
				</div>
				
			</div>
		</header>
		<div class="background1"></div>
		<!-- product detail -->
		<div class="product-detail">
			<div class="container">
				<div class="row">
					@if($data!=null)
						<div class="col-md-6 ">
							<div class="images">
								<img src="{!! asset($data['detailProduct']->image)!!}" alt="" class="img-fluid">
							</div>
							<div class="product-intro">
								<p>{!! $data['detailProduct']->introduce !!}</p>
							</div>
						</div>
						<div class="col-md-6 right">
							<form action="{{Route('addtocart')}}" method="get" accept-charset="utf-8">
								<div class="product-name">{!! $data['detailProduct']->name !!}</div>
								<div class="product-id">SKU: {!! $data['detailProduct']->id !!}
								<input type="hidden" name="product_id" value="{!! $data['detailProduct']->id !!}"></div>
								<div class="product-price">Price:{!! $data['detailProduct']->price !!}$</div>
								<div class="product-color">Color: {!! $data['detailProduct']->color !!}</div>
								<div class="color"><span></span></div>
								<div class="product-quantity">
									<div class="quantity">Quantity</div>
									<input type="number" value="1" name="product_number">
								</div>
								<div class="add-to-cart">
									<a href="">
										<button >ADD TO CART</button>
									</a>
								</div>
						    </form>
							<div class="product-info">
								<!-- Ẩn hiện nội dung js khi click zo -->
								<div class="product-title">
									<h2>Product info</h2>
									<div class="arrow">
										<i class="icon1 fas fa-minus"></i>
									</div>
								</div>
								
								<div class="product-text">
									<p>{!! $data['detailProduct']->description !!}</p>
								</div>
							</div>
						</div>
					@endif
				</div>
			</div>
		</div>
		<div class="comment_product">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="card text-center">
							  <div class="card-header">
							      <span style="font-family: 'Gamja Flower', cursive;font-size: 25px;font-weight: 500">Most recent Shopping Online reviews</span>
							  </div>
							  <div class="card-body">
							  	@if($data!=null)
                                    @foreach($data['comment'] as $comment)
									    <div class="response-customer" style="border-bottom: 1px solid #dcc0c0;text-align: left!important;">
												 <div>
													<span style="background-color: #3275ca;color: #ffffff">KH</span>
												    <span class="name_comment" style="font-weight: 700">
												     	{!! $comment->name_customer !!}
												    </span>
												 </div>
												 <div class="content_commnet" style="margin-left: 24px;">
											        {!! $comment->content !!}
											     </div>
											     <div class="time_comment" style="font-style: italic;font-size: 12px;float: right;">
											     	{!!  $comment->created_day !!}
											     </div>
											     <br>
										    </div>
										    <br>
									@endforeach
							    @endif
							    <div class="page" style="margin-top: 15px;">
                                  	{!! $data['comment']->links() !!}
                                </div>
							   </div>
							    <div class="card-footer text-muted" style="font-family: 'Gamja Flower', cursive;font-size: 25px;font-weight: 500">
							     Thanks! We wish You cant purchase this quality product 
							    </div>
						</div>	
					</div>
					<div class="col-md-6">
							<form method="post" action="{!! route('CommentProduct',['idproduct'=>$data['detailProduct']->id,'idemail'=> session('idEmail')]) !!}" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form--response" style="font-size: 40px;">
									Comment
								</div>
				  				<div class="form-group">
				    				<label for="exampleFormControlInput1" class="contact--us__title"> 
				    					<i class="fas fa-envelope-open"></i>
				    					Email address</label>
				    				<input type="email" class="form-control" id="exampleFormControlInput1" name="address_email" value="{!! $data['nameEmail'] !!}">
				  				</div>
				  				<div class="form-group">
				    				<label for="exampleFormControlInput1" class="contact--us__title"> 
				    					<i class="fas fa-envelope-open"></i>
				    					Name Customer</label>
				    				<input type="text" class="form-control" id="exampleFormControlInput1" name="name_customer" placeholder="" value="{!! $data['nameUser'] !!}">
				  				</div>		  				
				  				<div class="form-group">
				    				<label for="exampleFormControlTextarea1" class="contact--us__title">
									<i class="fas fa-terminal"></i>
				    				Content of your response</label>
				    				<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content_comment"></textarea>
				  				</div>
								<div class="btn--submit">
									<input type="submit" name="Send" value="Send"  class="btn btn-primary" />
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
		<!-- footer -->
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

		<script type="text/javascript" src="{!! asset('js/product.js')!!}"></script>
	</body>
</html>