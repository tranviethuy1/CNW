<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Thư viện sử dụng ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="{!! asset('css/admin.css')!!}">
<script type="text/javascript" src="{!! asset('js/status_information.js') !!}"></script>
</head>
<body>

	<div class="admin">
		<div class="contanier">
		<div class="row list_product">
			<div class="panel panel-default">
				<div class="panel-body">					
				<script type="text/javascript">
					$(document).ready(function(){	
						$('#search_cart').on('keyup',function(){
							$value = $(this).val();
							$.ajax({
								type: 'get',
								url: "{!! url('searchbills') !!}",
								data: {'search_bill': $value},
								success:function(data){
									$('tbody').html(data);
								}
							});
						});
					});
				</script>

				<div class="row">
						<div class="col-md-4">
							<ul>
								<li class="menubar--item">
									<a class="menubar--link" href="{{route('listProduct')}}">Home</a>
								</li>
								<li class="menubar--item">
									<a class="menubar--link" href="{!! route('getAddProduct') !!}">Add New Product</a>
								</li>
								<li class="menubar--item">
									<a class="menubar--link" href="{!! route('showallusers') !!}">All User</a>
								</li>
							</ul>
						</div>

						<div class="col-md-5">
							<form class="form-inline">
							  <div class="form-group mx-sm-3 mb-2">
							    <label for="inputPassword2" class="sr-only"></label>
							    <input type="text" class="form-control" id="search_cart" name="search_cart" >
							  </div>
							  <button type="submit" class="btn btn-primary mb-2 btn--search">
							  	<i class="fa fa-search"></i>
							  </button>
							</form>
						</div>

						<div class="col-md-3 ">
							<div class="show_sort_product">
								<form method="post" action="{!! route('choosebills') !!}" class="form--pick">
									<input type="hidden" name="_token" value="{{ csrf_token() }}" >
									<input type="submit" name="ssProduct" value="Show" class="btn--pick">
								    <select class="selectpicker" name="numberBill" style="background: white;
								    padding: 8px;
								    border-radius: 5px;
								    border: 1px solid #337ab7;
								    color: #337ab7;">
								    	  <option value="9" selected="selected">Number Bill</option>
								    	  <option value="10">10</option>
										  <option value="11">11</option>
										  <option value="12">12</option>
										  <option value="13">13</option>
										  <option value="14">14</option>
										  <option value="15">15</option>
										  <option value="16">16</option>
										  <option value="17">17</option>
										  <option value="18">18</option>
										  <option value="19">19</option>
										  <option value="20">20</option>
										  <option value="21">21</option>
										  <option value="22">22</option>
								    </select>
								</form>
							</div>
						</div>
					</div>
				</div>						

				<div class="table-data table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Customer</th>
								<th>Product ID</th>
								<th>Product Name</th>
								<th>Product Color</th>
								<th>Amount</th>
								<th>Price for one</th>
								<th>Buy at</th>
							</tr>
						</thead>

						<tbody>
							@if($bills != null)
								@foreach($bills as $value)
									<tr>
										<td>{!! $value->id!!}</td>
										<td>{!! $value->customer !!}</td>
										<td>{!! $value->product_id !!}</td>
										<td>{!! $value->product_name !!}</td>
										<td>{!! $value->product_color !!}</td>
					                    <td>{!! $value->product_number !!}</td>
					                    <td>{!! $value->product_price !!}</td>
					                    <td>{!! $value->create_at !!}</td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
				    <div>
					    	<div class="page_title">Showing 1 to <?php if(!isset($number)){echo "9";}else{echo $number;}?> Bills</div>
					    	<div class="page_number">{!! $bills->links() !!}</div>
					</div>
				</div>

				<div class="panel-footer">
					<div class="inline">Copyright2018@CNW</div>
				</div>
			</div>
		</div>
	    </div>
	</div>	

</body>
</html>