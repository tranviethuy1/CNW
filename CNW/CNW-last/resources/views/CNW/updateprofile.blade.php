<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add product</title>
  <meta charset="utf-8">
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
<link rel="stylesheet" type="text/css" href="{!! asset('css/updateprofile.css') !!}">
</head>
<body>
    <div class="container">
    	<div class="row add_product_title">
    		<div class="col-1">
	    		<div class="title_add_product" ">
					<a href="{!! url('shop/color','ALL')!!}" >
						<i class="fas fa-backward"></i>
					</a>
				</div>
    		</div>
    		<div class="col-2"></div>
    		<div class="col-1"></div>
    		<div class="col-4">
    			<div class="title_add_product">Update Profile</div>
    		</div>
    		<div class="col-4"></div>
    	</div>
		<div class="row add_product_menu">
			<div class="col-lg-6">
			@if(isset($imformation->avatar))
	          <img src = "{!! asset($imformation->avatar) !!}" class="image_add_product">
	        @else
	          <img src='http://websamplenow.com/30/userprofile/images/avatar.jpg' class='image_add_product img-thumbnail'>
	        @endif
		    </div>
		  
			<div class="col-lg-6">

				<div class="status" style="margin-top: 15px;">
			    	@if(session('alert'))
					<span class="alert alert-success form-control">
						{!! session('alert') !!}
					</span>
				    @endif
			    </div>

				<form  action="{!! route('excuteupdateprofile') !!}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group" >
				    <label for="exampleInputEmail1" >Email</label>
				    <input type="text" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $user->email;?>" name="email" disabled>
				</div>
				<div class="form-group" >
				    <label for="exampleInputEmail1" >Name</label>
				    <input type="text" class=" form-control input--text" id="name" aria-describedby="emailHelp" placeholder="Your Name" value="<?php if(isset($imformation->name)){echo $imformation->name;} ?>" name="name">
				    @if(session()->has('name'))
					<span class="text-danger">{!! session('name')!!}</span>
					@endif
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Avatar</label>
				    <input type="file" class="input--file" id="photo"  name="avatar" >
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Date Of Birth</label>
				    <input type="text" class="form-control input--text" id="dateofbirth" value="<?php if(isset($imformation->birth)){echo $imformation->birth;}?>" name="birth">
				    @if(session()->has('birth'))
					<span class="text-danger">{!! session('birth')!!}</span>
					@endif
				</div>

		        <div class="form-group">
				    <label for="exampleInputPassword1">Gender</label>
				    <div class="malecheck">
					    Male<input id="gender" name="gender" type="radio" class="form-check" value="1" <?php if(isset($imformation->male)){if($imformation->male==1){echo "checked";}} ?> >
					    Female<input id="gender" name="gender" type="radio" class="form-check" value= "2" <?php if(isset($imformation->male)){if($imformation->male==2){echo "checked";}} ?>>				    
			               	@if(session()->has('gender'))
							<span class="text-danger">{!! session('gender')!!}</span>
							@endif
					</div>		
				</div>

				<div class="form-group">
				    <label for="exampleInputPassword1">Phone Number</label>
				    <input type="text" class="form-control input--text" id="phone" value="<?php echo $user->phone ;?>" name="phone">
				    @if(session()->has('phone'))
					<span class="text-danger">{!! session('phone')!!}</span>
					@endif
				</div>

				<div class="form-group">
				    <label for="exampleInputPassword1">Address</label>
				    <input type="text" class="form-control input--text" id="Address" value="<?php echo $user->address ;?>" name="address">
				    @if(session()->has('address'))
					<span class="text-danger">{!! session('address')!!}</span>
					@endif
				</div>

				  <button type="submit" class="btn btn-primary ">Update Profile</button>
			    </form>
		    </div>
		</div>
	</div>
</body>
</html>