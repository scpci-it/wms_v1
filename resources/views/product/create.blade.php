@extends('main.app')

@section('content')

<div>
	<ul>

		
		@foreach($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach
	

	</ul>

</div>



<div class="container">

	<div class="card-header bg-primary">

	 <h1 style="text-align:center;font-weight: bold;">CREATE A PRODUCT</h1>

</div>
	<form method="POST" action="/products">
		 {{ csrf_field() }}
		 
		<div class="form-group">
			<label for="name">Name:</label>
		    <input type="text" class="form-control" id="name" name="name" required>
		</div>

		<div class="form-group">
			<label for="code">Code:</label>
		    <input type="text" class="form-control" id="code" name="code" required>
		</div>

		<div class="form-group">
			<label for="category_id">Category:</label>
  			<select class="form-control" id="category_id" name="category_id">
  				@foreach($categories as $category)
  					<option value="{{ $category->id }}">{{ $category->name }}</option>
  				@endforeach
  			</select>
		</div>
		
		<button type="submit" class="btn btn-primary">Submit</button>
	</form> 
</div>

@endsection