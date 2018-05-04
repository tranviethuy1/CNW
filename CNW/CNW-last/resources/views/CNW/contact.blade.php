<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Contact us</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- font family-->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Quicksand:300&amp;subset=vietnamese" rel="stylesheet">	

	<!-- font awesome -->
	<link rel="stylesheet" type="text/css" href="{!! asset('Font-awesome/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css') !!}">
	<!-- boostrap -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">

	<script src="{!! asset('js/jquery-slim.min.js') !!}"></script>
	<script src="{!! asset('js/popper.min.js') !!}"></script>
	<script src="{!! asset('js/bootstrap.min.js')!!}"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="{!! asset('js/owl.carousel.min.js') !!}"></script>
	<!-- jquery -->


	<!-- my css and js -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/owl.carousel.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/headandfoot.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/contact.css') !!}">
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
								<img src="{!! asset('IMG/logo.gif') !!}" class="img-fluid">
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
			</div>
			
		</div>
	</header>

	<div class="contact--all">
		<div class="container">
			<div class="all__p">
				<p>
					All you need 
				</p>
				<p>
					To Know
				</p>
			</div>
			<div class="contact--all__img">
				<img src="{!! asset('IMG/arrow.PNG') !!}" class="img-fluid" />
			</div>
		</div>
	</div>

	<div class="parag">
		<div class="container">
			<div class="row">
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-4 text-center">
							<img src="{!! asset('IMG/contact-1.gif')!!}" class="img-fluid" />
						</div>
						<div class="col-md-8  paddingTop30 text-center">
							<div class="title--top parag--title">
								Shipping
							</div>
							<span class="title--bot parag--title">
								Policy
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-8 paddingTop30">
					<p>
						I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<p>
						This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="parag">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="row">
						<div class="col-md-4">
							<img src="{!! asset('IMG/contact-2.gif')!!}" class="img-fluid" />
						</div>
						<div class="col-md-8  paddingTop30">
							<div class="title--top parag--title">
								Refund & 
							</div>
							<span class="title--bot parag--title">
								Exchange
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-8 paddingTop30">
					<p>
						I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<p>
						This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="parag">
		<div class="container">
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="row">
						<div class="col-md-4">
							<img src="{!! asset('IMG/contact-1.gif')!!}" class="img-fluid" />
						</div>
						<div class="col-md-8  paddingTop30">
							<div class="title--top parag--title">
								
							</div>
							<span class="title--bot parag--title">
								Warranty
							</span>
						</div>
					</div>
				</div>
				<div class="col-md-8 paddingTop30">
					<p>
						I'm a paragraph. Click here to add your own text and edit me. It’s easy. Just click “Edit Text” or double click me to add your own content and make changes to the font. Feel free to drag and drop me anywhere you like on your page. I’m a great place for you to tell a story and let your users know a little more about you.
					</p>
					<p>
						This is a great space to write long text about your company and your services. You can use this space to go into a little more detail about your company. Talk about your team and what services you provide. Tell your visitors the story of how you came up with the idea for your business and what makes you different from your competitors. Make your company stand out and show your visitors who you are.
					</p>
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
</body>
</html>