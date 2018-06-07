@extends('main.app')

@section('content')


<div>
	<ul>

		<h3 style=" color:red;font-weight: bold">
		
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
		</h3>

		</ul>
	</div>
</div>

<div class="container">

	<div class="card-header bg-success">

	    	<h1 style="text-align:center;font-weight: bold;">Transfer Within Facility</h1>
		</div>

	<form method="POST" action="/transactions">
		 {{ csrf_field() }}
		<div class="form-group">
			<label for="from">Location From:</label>
  			<select class="form-control" id="from" name="from">
  				@foreach($from_locations as $location)
  					<option value="{{ $location->id }}">{{$location->warehouse->name}} / {{ $location->name }}</option>
  				@endforeach
  			</select>
		</div>

		<div class="form-group">
			<label for="to">Location To:</label>
  			<select class="form-control" id="to" name="to">
  				@foreach($to_locations as $location)
  					<option value="{{ $location->id }}">{{$location->warehouse->name}} / {{ $location->name }}</option>
  				@endforeach
  			</select>
		</div>

		<div class="form-group">
			<label for="product">Product:</label>
  			<select class="form-control" id="product" name="product_id">
  				@foreach($products as $product)
  					<option value="{{ $product->id }}">{{ $product->name }}</option>
  				@endforeach
  			</select>
		</div>
		  
		<div class="form-group">
			<label for="quantity">Quantity</label>
		    <input type="text" class="form-control" id="quantity" name="quantity" required>
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 
</div>

@endsection