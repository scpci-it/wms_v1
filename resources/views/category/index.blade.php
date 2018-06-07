@extends('main.app')

@section('content')

<h1><center>CATEGORY</center></h1>

<div class="container">
	<table class="table">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Name</th>
	    
	      </tr>
	    </thead>
	    <tbody>
    		@foreach($categories as $category)
		      <tr>
		        <td>{{ $category->id }}</td>
		        <td>{{ $category->name }}</td>
		      </tr>
	      	@endforeach
	    </tbody>
  	</table>
</div>

@endsection