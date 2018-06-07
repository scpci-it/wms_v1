@extends('main.app')

@section('content')



<div class="container">
	<div class="card-header bg-primary">

	 <h1 style="text-align:center;font-weight: bold;">CREATE A LOCATION</h1>

	</div>
	<form method="POST" action="/locations">
		 {{ csrf_field() }}
		 
		<div class="form-group">
			<label for="name">Name:</label>
		    <input type="text" class="form-control" id="name" name="name" required>
		</div>

		<div class="form-group">
			<label for="type">Type:</label>
		   <select class="form-control" id="type" name="type">
		   		
		   			<option> Physical</option>
		   			<option>Virtual</option>
		   		
		   	</select>
		</div>
		
		<div class="form-group">
			<label for="product">Warehouse:</label>
  			<select class="form-control" id="wh_id" name="wh_id">
  				@foreach($warehouses as $warehouse)
  					<option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
  				@endforeach
  			</select>
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 
</div>

@endsection