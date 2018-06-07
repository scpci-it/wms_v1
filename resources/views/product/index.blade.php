@extends('main.app')

@section('content')

<h1><center>PRODUCTS</center></h1>

<div class="container">
	<table class="table">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Name</th>
	        <th>Category</th>
	      </tr>
	    </thead>
	    <tbody>
    		@foreach($products as $product)
		      <tr>
		        <td>{{ $product->id }}</td>
		        <td>{{ $product->name }}</td>
		        <td>{{ $product->category->name }}</td>
		      </tr>
	      	@endforeach
	    </tbody>
  	</table>
</div>

@endsection