@extends('main.app')

@section('content')

<h1><center>WAREHOUSE</center></h1>

<div class="container">
	<table class="table">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Name</th>
	        <th>Code</th>
	    
	      </tr>
	    </thead>
	    <tbody>
    		@foreach($warehouses as $warehouse)
		      <tr>
		        <td>{{ $warehouse->id }}</td>
		        <td>{{ $warehouse->name }}</td>
		        <td>{{ $warehouse->code }}</td>
		      </tr>
	      	@endforeach
	    </tbody>
  	</table>
</div>

@endsection