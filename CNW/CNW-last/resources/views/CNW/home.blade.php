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
	<link rel="stylesheet" type="text/css" href="{!! asset('Font-awesome/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css') !!}">
	<!-- boostrap -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">

	<script src="{!! asset('js/jquery-slim.min.js') !!}"></script>
	<script src="{!! asset('js/popper.min.js') !!}"></script>
	<script src="{!! asset('js/bootstrap.min.js')!!}"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="{!! asset('js/owl.carousel.min.js')!!}"></script>
	<!-- jquery -->


	<!-- my css and js -->
	<link rel="stylesheet" type="text/css" href="{!! asset('css/owl.carousel.min.css') !!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/headandfoot.css')!!}">
	<link rel="stylesheet" type="text/css" href="{!! asset('css/Style.css')!!}">

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
								<a href="{!! url('home.html')!!}">Casies</a>
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
	<!-- banner -->
	
	<div class="banner">	
		<div class="container">
			<img src="{!! asset('IMG/banner0.png') !!}" >
			<div class="banner--title">
				<span>
					New Casies
				</span>
				<span>
					Arrivals
				</span>
				<p >
					Availabe Now!
				</p>
				<div class="banner--btn">
					<a href="{!! url('shop/color','ALL')!!}">View Collection</a> <!-- sang trang shop-->
				</div>
			</div>

			<div class="banner--phone">
				<img src="{!! asset('IMG/banner-img.png')!!}" class="img-fluid" >
			</div>
		</div>
	</div>

	<!-- shipping -->
	<div class="shipping">
		<div class="container">
			<div class="shipping--part __part1">
				<img src="{!! asset('IMG/star.gif')!!}" class="img-fluid" />
				<div class="font-italic">
					Casies 
				</div>
				<div class="font-italic">
					Best Sellers
				</div>
				<span>
					"Typocase" Collection
				</span>
				<div class="shipping--btn">
					<a href="{!! url('shop/color','ALL')!!}">Buy Now</a> 
				</div>
			</div>
			<div class=" __part2">
				<img src="{!! asset('IMG/banner2-2.png')!!}" class="img-fluid" />
			</div>
			<div class="shipping--part __part3">
				<img src="{!! asset('IMG/ship.gif')!!}" class="img-fluid"/>
				<div class="font-italic">Free</div>
				<div class="font-italic">Shipping</div>
				<span>
					Only this weekend
				</span>
			</div>
		</div>
	</div>

	<div class="product">
		<div class="container">
			<div class="title">
				<p>
					Pick Your Case
				</p>
			</div>

			<div class="owl-carousel list">
				@if(!empty($newProduct))
					@foreach($newProduct as $product)
	            	<div class="item">
	              		<a href="{!! url('shop/product_detail',['idemail'=>0,'idproduct'=>$product->id]) !!}">
	              			<img src="{!! asset($product->image) !!}" class="img-fluid" />
							<div class="item--view">
								Quick View
							</div>
	              		</a>
	            	</div>
	            	@endforeach
	            @endif	            	
          	</div>
		</div>
	</div>

	<!-- galary -->
	
	<div class="gallery">	
		<div class="container">	
			<div class="title">
				<p>
					Casiss Gallery
				</p>
			</div>
			
			<div class="owl-carousel gallery--list">
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala1.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala2.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala3.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala4.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala5.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala6.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala7.jpg')!!}">
              		</a>
            	</div>
            	<div class="item">
              		<a href="#">
              			<img src="{!! asset('IMG/gala8.jpg')!!}">
              		</a>
            	</div>
            </div>
		</div>
	</div>
	<!-- Đăng kí nhanh tài khoản -->
	<div class="subscriber">
		<div class="container1">
			<div class="title">
				<div class="container">
					<p>
						Be a Casies Subscriber
					</p>
				</div>				
			</div>			
			<div class="subscriber--form">
				<div class="container">
					<div class="row">
						<div class="col-sm-3 col-md-1  col-lg-3"></div>
						<div class="col-sm-6 col-md-10  col-lg-6">
								<form class="form-inline" method="get" action="{!! url('shop') !!}">
  									<div class="container">
  										<div class="row">
  										<div class="col-md-8">
  											<div class="form-group mb-2 ">
				    							<span>
				    								<div class="sub--icon">
				    									<i class="far fa-envelope"></i>
				    								</div>
				    							</span>
    											<input type="email" class="form-control sub--input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  											</div>  											
  										</div>
  										<div class="col-md-4">
  												<button type="submit" class="btn btn-primary mb-2">Subscriber Now</button>
  										</div>
  									</div>
  									</div>
								</form>							
						</div>
						<div class="col-sm-3 col-md-1 col-lg-3"></div>
					</div>
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
	 	
<!-- script carousel -->
	 	<script>
            $(document).ready(function() {
              $('.list').owlCarousel({
                loop: true,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    
                  },
                  600: {
                    items: 2,
                    margin: 60,
                    
                  },
                  960:{
			            items:3
			        },
                  1000: {
                    items: 5,
                   	loop: true,
                  }
                }
              })
            })
        </script>

        <script>
            var owl = $('.gallery--list');
			owl.owlCarousel({
    			loop:true,
    			nav:false,
    			margin:5,
    			autoplay:true,
    			autoplayTimeout:3000,
    			autoplayHoverPause:true,
			    responsive:{
			        0:{
			            items:1
			        },
			        600:{
			            items:2
			        },            
			        960:{
			            items:3
			        },
			        1200:{
			            items:4
			        }
			    }
			});
			owl.on('mousewheel', '.owl-stage', function (e) {
			    if (e.deltaY>0) {
			        owl.trigger('next.owl');
			    } else {
			        owl.trigger('prev.owl');
			    }
			    e.preventDefault();
			});
        </script>
        
        <script type="text/javascript" src="{!! asset('js/home.js')!!}"></script>

</body>
</html>