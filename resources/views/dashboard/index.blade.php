@extends('main.app')

@section('content')

	<div class="container">
	  <div class="card">
	    <div class="card-header bg-success">

	    	<h1 style="text-align:center;font-weight: bold;">Current Product Stocks</h1>
		</div>

	    <div class="card-body">
	    	<table id="table_id" class="table">
			    <thead>
			      <tr>
			      	<th><center>Product Code</center></th>
			       <th><center>Product</center></th>
			        <th><center>Reorder Point</center></th>
			        <th><center>Quantity</center></th>
			        <th><center>Physical Inventory</center></th>
			      </tr>
			    </thead>
			    <tbody>
			    	@foreach($products as $product)
			    	<tr>
			    		<td><center>{{$product->code}}</center></td>
			    		<td><a href="/inventory/{{ $product->id}}">{{$product->name}}</a></td>
			    		<td><center>{{$product->reorder_point}}</center></td>
			    		<td bgcolor="{{$product->total_stocks <= 0 ? '#E94858' : 'white' }}"><center>{{$product->total_stocks}}</center></td>

			    		<td><center> <a href = "/physical/{{$product->id}}">Phy. Inv.</a></center></td>

			    	</tr>
			    	@endforeach

			    </tbody>

  			</table>
	    </div>
	  </div>
	</div>

@endsection

@section('scripts')

	$(document).ready( function () {
    	$('#table_id').DataTable();
	} );

@endsection