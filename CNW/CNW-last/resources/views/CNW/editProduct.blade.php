<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit product</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('css/add_edit.css') !!}">
</head>
<body>
    <div class="container">
    	<div class="row add_product_title">
			<div class="title_add_product">
				<a href="{!! route('listProduct') !!}">Back List Product</a>
			</div>
			<div class="title_add_product">Edit Product</div>
    	</div>
		<div class="row add_product_menu">
			<div class="col-xs-6">
		    	<img src="{!! asset('IMG/list.jpg')!!}" class="image_add_product">
		    </div>
			<div class="col-xs-6">
				<form method="post" action="{!! route('postEditProduct',['id'=> $DataUpdateProduct->id]) !!}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="form-group">
				    <label for="exampleInputEmail1" >Type Product</label>
				    <input type="text" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" name="edit_type_product" value="{!! $DataUpdateProduct->type !!}">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Name</label>
				    <input type="text" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" name="edit_name_product" value="{!! $DataUpdateProduct->name !!}">
				    @if(session('erro_format_name1'))
					<span class="text-danger">
						{!! session('erro_format_name1') !!}
					</span>
				    @endif
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Price</label>
				     <input type="number" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" name="edit_price_product" value="{!! $DataUpdateProduct->price !!}" step="0.01">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Number</label>
				    <input type="number" class=" form-control input--text" id="exampleInputEmail1" aria-describedby="emailHelp" name="edit_number_product" value="{!! $DataUpdateProduct->number !!}">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Color</label>
				    <select class="selectpicker form-control " name="edit_color_product">
						<option value="White"  @if($DataUpdateProduct->color=='White')  selected="selected" @endif >White</option>
						<option value="Blue"  @if($DataUpdateProduct->color=='Blue') selected="selected" @endif >Blue</option>
						<option value="Green"  @if($DataUpdateProduct->color=='Greem') selected="selected" @endif >Green</option>
						<option value="Yellow"  @if($DataUpdateProduct->color=='Yellow') selected="selected" @endif >Yellow</option>
						<option value="Orange"  @if($DataUpdateProduct->color=='Orange') selected="selected" @endif >Orange</option>
						<option value="Purple"  @if($DataUpdateProduct->color=='Purple') selected="selected" @endif >Purple</option>
						<option value="Gray"  @if($DataUpdateProduct->color=='Gray') selected="selected" @endif >Trang</option>
						<option value="Red"  @if($DataUpdateProduct->color=='Red') selected:"selected" @endif >Red</option>
					</select>
				</div>
				<div class="form-group">
				    <label for="exampleTextarea">Introduce</label>
				    <textarea class="form-control" id="exampleTextarea" rows="3" name="edit_introduce_product">{!! $DataUpdateProduct->introduce !!}</textarea>
				</div>
				<div class="form-group">
				    <label for="exampleTextarea">Description</label>
				    <textarea class="form-control" id="exampleTextarea" rows="3" name="edit_description_product" >{!! $DataUpdateProduct->description !!}</textarea>
				</div>
				<div class="form-group">
				    <label for="exampleInputFile">Now Image : </label>
				    <img src="{!! asset($DataUpdateProduct->image) !!}" style="width: 120px;height: 120px;">
				    <div>
				    	<label for="exampleInputFile">Image Replace : </label>
				    </div>
				    <input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp" name="fImages">
				    <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
				</div>
				<button type="submit" class="btn btn-primary " >Edit Product</button>
			    </form>
		    </div>
		</div>
	</div>
</body>
</html>