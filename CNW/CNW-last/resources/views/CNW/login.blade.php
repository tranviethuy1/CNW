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
        								<a class="nav-link" href="{!! url('home')!!}">Home</a>
      								</li>
    								<li class="nav-item">
										<!-- Xử lí sao cho người đó vẫn có thể vào shop nhé -->
										<a class="nav-link link-child" href="{!! url('shop/color','ALL')!!}">Shop</a>
									</li>
      								<li class="nav-item">
        								<a class="nav-link" href="{!! url('contact')!!}">Contact</a>
      								</li>
      								<li class="nav-item">
        								<a class="nav-link" href="{!! route('getLogin') !!}">Login</a>
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
                    <div class="dangNhap">
						<div class="login--icon">
							<img src="{!! asset('IMG/iconLogin1.gif')!!}" alt="" class="img-fluid"/>
						</div>
						<div class="loggin--title">
							Member Login
						</div>
						<form action="{!! route('postLogin') !!}" method="POST">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  						<div class="form-group">
	    						<label for="exampleInputEmail1"><i class="fas fa-envelope"></i>Email</label>
	    						<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email_login">
	  						</div>
							<div class="form-group">
								<label for="exampleInputEmail1"><i class="fas fa-key"></i>Password</label>
	    						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password_login">
	  						</div>	  
	  						<button type="submit" class="btn btn-primary">Sign in</button>
	  						
	  						@if(session('status_login'))
	  						<span class="text-danger">
	  							{!! session('status_login') !!}
	  						</span>
	  						@endif
						</form>
						<div class="login--signup">
							<span>
								<a href="{!! route('get_sign')!!}">Create an account?</a>
							</span>
							<span>
								<a href="{!! route('get_change_pww') !!}">Change password ?</a>
							</span>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>	
</body>
</html>