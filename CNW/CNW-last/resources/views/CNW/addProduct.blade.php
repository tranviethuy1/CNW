<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add product</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="{!! asset('js/status_information.js') !!}"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('css/add_edit.css') !!}">
</head>
<body>
    <div class="container">
    	<div class="row add_product_title">
			<div class="title_add_product">
				<a href="{!! route('listProduct') !!}">Back List Product</a>
			</div>
			<div class="title_add_product">Add Product</div>
    	</div>
		<div class="row add_product_menu">
			<div class="col-xs-6">
		    	<img src="{!! asset('IMG/list.jpg') !!}" class="image_add_product">
		    </div>
			<div class="col-xs-6">
				<form  action="{{Route('postAddProduct')}}" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group" >
				    <label for="exampleInputEmail1" >Type Product</label>
				    <input type="text" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter type product" name="type_product">
				    @if($errors->has('type_product'))
					<span class="text-danger">{!! $errors->first('type_product')!!}</span>
					@endif
				</div>
				<div class="form-group" >
				    <label for="exampleInputEmail1" >Name</label>
				    <input type="text" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter name" name="name_product">
				    @if($errors->has('name_product'))
					<span class="text-danger">{!! $errors->first('name_product')!!}</span>
					@endif
					@if(session('erro_format_name'))
					<span class="text-danger">
						{!! session('erro_format_name') !!}
					</span>
				    @endif
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Price</label>
				    <input type="number" class="form-control input--text" id="exampleInputPassword1" placeholder="Enter price" name="price_product" step="0.01">
				    @if($errors->has('price_product'))
					<span class="text-danger">{!! $errors->first('price_product')!!}</span>
					@endif
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Number</label>
				    <input type="number" class="form-control input--text" id="exampleInputPassword1" placeholder="Enter number" name="number_product">
				    @if($errors->has('number_product'))
					<span class="text-danger">{!! $errors->first('number_product')!!}</span>
					@endif
				</div>
				<div class="form-group">
				    <label for="exampleTextarea">Color</label>
				    <select class="selectpicker form-control " name="color_product">
						<option value="White" >White</option>
						<option value="Blue">Blue</option>
						<option value="Green">Green</option>
						<option value="Yellow">Yellow</option>
						<option value="Orange">Orange</option>
						<option value="Purple">Purple</option>
						<option value="Gray">Gray</option>
						<option value="Red">Red</option>
					</select>
				    @if($errors->has('color_product'))
					<span class="text-danger">{!! $errors->first('color_product')!!}</span>
					@endif
				</div>
				<div class="form-group">
				    <label for="exampleTextarea">Introduce</label>
				    <textarea class="form-control" id="exampleTextarea" rows="3" name="introduce_product"></textarea>
				    @if($errors->has('introduce_product'))
					<span class="text-danger">{!! $errors->first('introduce_product')!!}</span>
					@endif
					@if(session('erro_introduce'))
					<span class="text-danger">
						{!! session('erro_introduce') !!}
					</span>
				    @endif
				</div>
				<div class="form-group">
				    <label for="exampleTextarea">Description</label>
				    <textarea class="form-control" id="exampleTextarea" rows="3" name="description_product"></textarea>
				    @if($errors->has('description_product'))
					<span class="text-danger">{!! $errors->first('description_product')!!}</span>
					@endif
					@if(session('erro_description'))
					<span class="text-danger">
						{!! session('erro_description') !!}
					</span>
				    @endif
				</div>
				<div class="form-group">
				    <label for="exampleInputFile">File input</label>
				    <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp" name="image">
				    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
				    @if($errors->has('image'))
					<span class="text-danger">{!! $errors->first('image')!!}</span>
					@endif
				</div>
				<div class="form-check">
				    <label class="form-check-label">
				      <input type="radio" class="form-check-input" value="1" name="radio_product">
				      <span style="color: green" class="active" >Active</span>
				    </label>
				  </div>
				  <button type="submit" class="btn btn-primary ">Add Product</button>
			    </form>
			    <div class="status" style="margin-top: 15px;">
			    	@if(session('status_add_product'))
					<span class="alert alert-danger form-control">
						{!! session('status_add_product') !!}
					</span>
				    @endif
			    </div>
		    </div>
		</div>
	</div>
</body>
</html>
