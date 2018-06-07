@extends('main.app')

@section('content')

<h1><center>LOCATION</center></h1>

<div class="container">
	<table class="table">
	   
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Name</th>
	          <th>Warehouse Name</th>
	    
	      </tr>
	    </thead>
	    <tbody>
    		@foreach($locations as $location)
		      <tr>
		        <td>{{ $location->id }}</td>
		        <td>{{ $location->name }}</td>
		         <td>{{ $location->warehouse->name}}</td>
		      </tr>
	      	@endforeach
	    </tbody>
  	</table>
</div>

@endsection