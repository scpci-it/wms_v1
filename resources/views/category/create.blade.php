@extends('main.app')

@section('content')

<h1><center>CREATE A CATEGORY</center></h1>

<div class="container">
	<form method="POST" action="/categories">
		 {{ csrf_field() }}
		 
		<div class="form-group">
			<label for="name">Name:</label>
		    <input type="text" class="form-control" id="name" name="name">
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 
</div>

@endsection