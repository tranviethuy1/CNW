<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="{!! asset('Font-awesome/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css')!!}">
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

<style >
	.avatar{
		width: 50px;
		height: 50px;
	}
</style>
<body>
	<div class="admin">
		<div class="contanier">
		<div class="row list_product">
			<div class="panel panel-default">

				<div class="panel-body">
					<script type="text/javascript">
						$(document).ready(function(){	
							$('#search_user').on('keyup',function(){
								$value = $(this).val();
								$.ajax({
									type: 'get',
									url: "{!! url('searchusers') !!}",
									data: {'search_user': $value},
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
									<a class="menubar--link" href="{!! route('showbills') !!}">Show Bill</a>
								</li>
							</ul>
						</div>
						<div class="col-md-5">
							<form class="form-inline">
							  <div class="form-group mx-sm-3 mb-2">
							    <label for="inputPassword2" class="sr-only"></label>
							    <input type="text" class="form-control" id="search_user" name="search_user" >
							  </div>
							  <button type="submit" class="btn btn-primary mb-2 btn--search">
							  	<i class="fa fa-search"></i>
							  </button>
							</form>
						</div>

					</div>
				</div>						

				<div class="table-data table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>ID</th>
								<th>Avatar</th>
								<th>Customer</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Address</th>
								<th>Male</th>
								<th>Birth</th>
							</tr>
						</thead>

						<tbody>
							@if($users != null)
								@foreach($users as $user)
								<?php $imformation = \App\Imformations::where('id_employee',$user->id)->first(); ?>	
									<tr>
										<td>{!! $user->id !!}</td>
										<td>
											@if(isset($imformation->avatar))
											<img src="{!! asset($imformation->avatar) !!}" alt="123" class="avatar">
											@else
												<img src='http://websamplenow.com/30/userprofile/images/avatar.jpg' alt="123" class="avatar">
											@endif
										</td>
										<td>
											@if(isset($imformation->name))
											 	{{$imformation->name}}
											@endif
										</td>
										<td>{!! $user->email!!}</td>
										<td>{!! $user->phone !!}</td>
					                    <td>{!! $user->address !!}</td>
					                    <td>
					                    	@if(isset($imformation->male))
												@if($imformation->male == 1)
													 {{"Male"}}
												@else
													{{"Female"}}
												@endif
					                    	@endif
					                    </td>
					                    <td>
					                    	@if(isset($imformation->birth))
												{{$imformation->birth}}
											@endif
					                    </td>
									</tr>
								@endforeach
							@endif
						</tbody>
					</table>
					<div>
				    	<div class="page_title">Showing 1 to 6 Customer</div>
				    	<div class="page_number">{!! $users->links() !!}</div>
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