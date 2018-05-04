<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Mobile Case</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- font family-->
	<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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
	<link rel="stylesheet" type="text/css" href="{!! asset('css/login.css')!!}">

	<script src="{!! asset('js/dangKy.js')!!}"></script>

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
        								<a class="nav-link link-child" href="{!! url('home')!!}">Home</a>
      								</li>
      								<li class="nav-item">
        								<a class="nav-link" href="{!! url('contact')!!}">Contact us</a>
      								</li>
      								<li class="nav-item cart">
        								<a class="nav-link" href="#">
											<i class="fas fa-shopping-bag"></i>
        								</a>
      								</li>
    							</ul>
  							</div>
						</nav>
					</div>
				</div>
			</div>			
		</div>
	</header>	
	<div class="login">
		<div class="container">
			<div class="row">
				<div class="form--img">
					<img src="{!! asset('IMG/bg-01.jpg')!!}" alt="" class="img-fluid"/>
				</div>
				<div class="form--login">
					<!-- Đăng kí -->
					<div class="dangKy">
						<div class="login--icon">
							<img src="{!! asset('IMG/iconLogin.gif')!!}" alt="" class="img-fluid"/>
						</div>
						<div class="loggin--title">
							Member Login
						</div>
						<form action="{!! route('post_sign') !!}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  						<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
	    						<label for="exampleInputEmail1"><i class="fas fa-envelope"></i>Email</label>
	    						<input type="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
	    						@if($errors->has('email'))
	    						<span class="text-danger">{!! $errors->first('email')!!}</span>
	    						@endif
	  						</div>
							<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
								<label for="exampleInputEmail1"><i class="fas fa-key"></i>Password</label>
	    						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
	    						@if($errors->has('password'))
	    						<span class="text-danger">{!! $errors->first('password')!!}</span>
	    						@endif
	  						</div>
	  						<div class="form-group {{ $errors->has('re_password_user') ? 'has-error' : '' }}">
								<label for="exampleInputEmail1"><i class="fas fa-key"></i>Retype Password</label>
	    						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="re_password_user">
	    						@if($errors->has('re_password_user'))
	    						<span class="text-danger">{!! $errors->first('re_password_user')!!}</span>
	    						@endif
	  						</div>
	  						<div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
								<label for="exampleInputEmail1"><i class="fas fa-mobile"></i>Phone number</label>
	    						<input type="number" class="form-control" id="exampleInputPassword1" placeholder="Phone number" name="phone">
	    						@if($errors->has('phone_user'))
	    						<span class="text-danger">{!! $errors->first('phone')!!}</span>
	    						@endif
	  						</div>
	  						<div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
								<label for="exampleInputEmail1"><i class="fas fa-address-card"></i>Address</label>
	    						<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Address" name="address">   						
	    						@if($errors->has('address'))
	    						<span class="text-danger">{!! $errors->first('address')!!}</span>
	    						@endif
	  						</div>  
	  						<button type="submit" class="btn btn-primary">Register</button>
	  						@if(session('status_register'))
	  						<span class="text-danger">
	  							{!! session('status_register') !!}
	  						</span>
	  						@endif
						</form>
						<div class="login--signup">
							You haved an account! <span class="nutdangNhap"><a href="{!! url('home/login')!!}">Login</a></span>
						</div>
					</div>			
				</div>
			</div>
		</div>
	</div>	
</body>
</html>