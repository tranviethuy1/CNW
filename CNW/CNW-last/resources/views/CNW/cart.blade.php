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
		<script src="{!! asset('js/status_information.js')!!}"></script>
		<!-- jquery -->
		<!-- my css and js -->
		<link rel="stylesheet" type="text/css" href="{!! asset('css/headandfoot.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/product.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/user.css')!!}">
		<link rel="stylesheet" type="text/css" href="{!! asset('css/shop.css')!!}">
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
									<a href="">Cart</a>
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
<!-- 	    											<span class="dropdown-item" href="#">
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
	      											<a class="dropdown-item" href="{!! url('updateprofile')!!}">Update Profile</a>
	      											<a class="dropdown-item" href="">Change Password</a>
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
				</div>
				
			</div>
		</header>
		<div class="background1"></div>
		<!-- cart -->
		<div class="status">
			@if(session('alert'))
			<span class="alert alert-success form-control" style="text-align: center;">{!! session('alert') !!}</span>
		    @endif
		</div>
		<div class="container">
			<div class="row" style="margin-top:50px;">           
				<table class="table table-hover">
				    <thead>
				      <tr>
				        <th>Product ID</th>
				        <th>Image</th>
				        <th>Product Name</th>
				        <th>Product Number</th>
				        <th>Product Price</th>
				        <th>Product Color</th>
				        <th>Total</th>
				        <th>Action</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@if(isset($contents))
				    	@foreach($contents as $content)
				      <tr>
				      	<form action="{{Route('updateitem',array($content->rowId))}}" method="get" accept-charset="utf-8">
				        <td>{{$content->id}}</td>
				        <?php $product = \App\Product::where('id',$content->id)->first(); ?>
				        <td><img src="{{asset($product->image)}}" alt="123" style="width: 50px;height: 50px;"></td>
				        <td>{{$content->name}}</td>
				        <td><input style="width: 60px; margin-left:30px;" type="number" name="number" value="{{$content->qty}}"></td>
				        <td><p style="text-align: center;">{{$content->price}}</p></td>
				        <td><p style="text-align: center;">{{$content->options->color}}</p></td>
				        <td>{{$content->price*$content->qty."$"}}</td>
				        <td><button class="btn btn-success">Update</button> <a href="{{Route('deleteitem',array($content->rowId,$content->id))}}" onclick="return DeleteCartMessage('Do you want to delete?')" class="btn btn-danger">Delete</a></td>
				        </form>
				      </tr>
				      @endforeach
				      @endif
				    </tbody>
 				 </table>
			</div>
	
			<script type="text/javascript">
				function DeleteCartMessage(msg){
					if(window.confirm(msg)){
						return true;
					}
					return false;
				};
			</script>
			<div class="row">
				<div class="col-md-6"></div>
				<div class="col-md-2"><a href="{!! url('shop/color','ALL')!!}" class="btn btn-danger">Continue Purchase</a></div>
				<div class="col-md-2"><a href="{{Route('payment')}}" class="btn btn-success">Payment</a></div>
				<div class="col-md-1"><p class="text-info" style="font-size: 20px;">Total:</p></div>
				<div class="col-md-1"><p class="text-info" style="font-size: 20px;"><?php if(isset($totals)){echo $totals."$";}?></p></div>
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