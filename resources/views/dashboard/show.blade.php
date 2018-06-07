@extends('main.app')

@section('content')

<div class="container">
	<div class="card">
	    <div class="card-header bg-warning">

	    	<h1 style="text-align:center;font-weight: bold;">{{ $product->name }}</h1>

	    </div>

     	<div class="card-body">
			<table class="table">
			    <thead>
			      <tr>
			      	<th>Warehouse</th>
			        <th>Location</th>
			        <th>Quantity</th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($product->locations as $location)
			    		@if($location->type ==  "Physical")
				    	<tr>
				    		<td>{{ $location->warehouse->name }}</td>
				    		<td>{{ $location->name }}</td>
				    		<td>{{ $location->pivot->stocks }}</td>
				    	</tr>
				    	@endif
			    	@endforeach

			    </tbody>
		  	</table>
	    </div>
    </div>
</div>

@endsection