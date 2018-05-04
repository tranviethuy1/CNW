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
<link rel="stylesheet" type="text/css" href="{!! asset('css/admin12.css')!!}">
<script type="text/javascript" src="{!! asset('js/status_information.js') !!}"></script>
<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans|Gamja+Flower|Indie+Flower" rel="stylesheet">
</head>
<body>
	<div class="admin">
		<div class="contanier">
		<div class="row list_product">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Admin Function</h3>
					<div class="name_admin">
						@if(session('Name'))
						<span style="color: blue">
							{!! session('Name') !!}
						</span>
						@endif
					</div>
					<!-- Onclick thực hiện chức năng -->
					<script type="text/javascript">
						 function logout(){
					        window.location="{!! route('logoutAdmin') !!}";
					    }
					</script>
					<div class="logout_admin">
						<button type="button" class="btn btn-default btn-sm button_logout">
                             <span class="glyphicon glyphicon-log-out" onclick="logout()"></span>
                             <span class="content_logout"><a href="{!! route('logoutAdmin') !!}">Logout</a></span>
                        </button>
					</div>
				</div>
				<div class="panel-body">
					<div class="status">
						@if(session('status_delete_product'))
						    <span class="alert alert-success form-control" >
							{!! session('status_delete_product') !!}
						    </span>
				        @endif
				        @if(session('status_update_product'))
				            <span class="alert alert-success form-control ">
				        	{!! session()->get('status_update_product')[0] !!}
				        	{!! session()->get('status_update_product')[1] !!}
				            </span>
				        @endif
					</div>
				    <script type="text/javascript">
				    	$(document).ready(function(){
				    		$('#search').on('keyup',function(){
				    			$value=$(this).val();
				    			$.ajax({
				    				type:'get',
				    				url :"{!! url('home/admin/search') !!}",
				    				data: {
				    					// gửi lên dữ liệu giá trị $value : Server trả về $request->search_product = $value
                                      'search_product':$value   
				    				},
				    				success:function(data){
				    					$('tbody').html(data);
				    				}
				    			});
				    		});
				    	});
			    		function DeleteProductMessage(msg){
			    			if(window.confirm(msg)){
			    				return true;
			    			}
			    			return false;
			    		};
				    </script> 	

				<div class="row">
						<div class="col-md-4">
							<ul>
								<li class="menubar--item">
									<a class="menubar--link" href="{!! route('getAddProduct') !!}">Add New Product</a>
								</li>
								<li class="menubar--item">
									<a class="menubar--link" href="{!! route('showbills') !!}">Show Bill</a>
								</li>
								<li class="menubar--item">
									<a class="menubar--link" href="{!! route('showallusers') !!}">All User</a>
								</li>
							</ul>
						</div>
						<div class="col-md-5">
							<form class="form-inline">
							  <div class="form-group mx-sm-3 mb-2">
							    <label for="inputPassword2" class="sr-only">Password</label>
							    <input type="text" class="form-control" id="search" name="search_product" >
							  </div>
							  <button type="submit" class="btn btn-primary mb-2 btn--search">
							  	<i class="fa fa-search"></i>
							  </button>
							</form>
						</div>
						<div class="col-md-3 ">
							<div class="show_sort_product">
								<form method="post" action="{!! route('pageProduct') !!}" class="form--pick">
									<input type="hidden" name="_token" value="{{ csrf_token() }}" >
									<input type="submit" name="ssProduct" value="Show" class="btn--pick">
								    <select class="selectpicker" name="numberProduct"  >
								    	  <option value="2" selected="selected">Page Product</option>
										  <option value="3">3</option>
										  <option value="4">4</option>
										  <option value="5">5</option>
										  <option value="6">6</option>
										  <option value="7">7</option>
										  <option value="8">8</option>
										  <option value="9">9</option>
										  <option value="10">10</option>
										  <option value="11">11</option>
										  <option value="12">12</option>
										  <option value="13">13</option>
										  <option value="14">14</option>
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
								<th>Type</th>
								<th>Name</th>
								<th>Introduce</th>
								<th>Description</th>
								<th>Price</th>
								<th>Number</th>
								<th>Image</th>
								<th>Color</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if($product1===0)
								<tr>
									<td colspan="8">
										No data
									</td>
									<td><a href="#" class="btn btn-danger">Edit</a></td>
									<td><a href="#" class="btn btn-success">Delete</a></td>
								</tr>
								@else
								@foreach($product1 as $value)
								<tr>
									<td>{!! $value->id !!}</td>
									<td >{!! $value->type !!}</td>
									<td >{!! $value->name !!}</td>
									<td >{!! $value->introduce !!}</td>
									<td >{!! $value->description !!}</td>
			                        <td >{!! $value->price !!}</td>
	                                <td >{!! $value->number !!}</td>
	                                <td style="width: 400px;"><img src=" {!! Asset($value->image) !!}" class="img-fluid hinhanh" /></td>
	                                <td >{!! $value->color !!}</td>
									<td ><a href="{!! url('home/admin/edit',$value->id) !!}" class="btn btn-danger">Edit</a></td>
									<td ><a href="{!! url('home/admin/delete',$value->id) !!}" class="btn btn-success deleteProduct" onclick="return DeleteProductMessage('Bạn Có muốn xóa product ?')">Delete</a></td>
								</tr> 							
								@endforeach
							@endif
						</tbody>
				    </table>
				    <div>
					    	<div class="page_title">Show  1 to 10 product</div>
					    	<div class= "page_number">
								<ul class="pagination center">
									@if($product1->currentPage() != 1)
								    	<li class="page-item"><a class="page-link" href="{!! str_replace('/?','?',$product1->url($product1->currentPage()-1) )!!}">Previous</a></li>
								    @endif

									@for($i = 1; $i <= $product1->lastPage(); $i++)
								    <li class="{!! ($product1->currentPage() == $i) ? 'active' : 'page-item' !!}"><a class="page-link" href="{!! str_replace('/?','?',$product1->url($i) )!!}">{!! $i !!}</a></li>
									@endfor
									@if($product1->currentPage() != $product1->lastPage())
								    	<li class="page-item"><a class="page-link" href="{!! str_replace('/?','?',$product1->url($product1->currentPage()+1) )!!}">Next</a></li>
								    @endif
						 		 </ul>
							</div>
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