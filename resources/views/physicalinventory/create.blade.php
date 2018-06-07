@extends('main.app')

@section('content')

<h1><center>Physical Inventory of {{$product->name}}</center></h1>

<div class="container">
	<form method="POST" action="/physical">
		{{csrf_field()}}
	<table class="table">
	    <thead>
	      <tr>
	        <th>Location</th>
	        <th>Current Stocks</th>
	        <th>Actual Stocks</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($locations as $location)
	    	<tr>
	    		<td>
	    			<div>{{$location->warehouse_name }} / {{ $location->location_name }}</div>
	    		</td>

	    		<td>
	    			
	    			<div class="form-group">

					  <input type="text" class="form-control" name="current[{{$location->location_id}}]" value ={{$location->stocks}} readonly="readonly">
					  	
					  </input> 
					</div>	

	    		</td>
	    		<td>
	    			<div class="form-group">

					  <input type="text" class="form-control" name="actual[{{$location->location_id}}]" value = 0>
					</div>
	    		</td>

	    	</tr>
	    	@endforeach

	    	

	    </tbody>
  	</table>
  			<div>
  				<input type="hidden" name="product_id" value="{{$product->id}}">
  				<button type="submit" class="btn btn-primary">Submit</button>
  			</div>
	</form>
</div>


@endsection