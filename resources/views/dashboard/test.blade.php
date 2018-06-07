@extends('main.app')

@section('card-header')

	<h1><center>Current Product Stocks</center></h1>

@endsection

@section('card-body')

<div class="container">
	<table class="table">
	    <thead>
	      <tr>
	        <th>Product</th>
	        <th>Quantity</th>
	      </tr>
	    </thead>
	    <tbody>
	    	@foreach($stocks_per_product as $item)
	    	<tr>
	    		<td><a href="/Dashboard/{{ $item['Id']}}">{{$item['Product']}}</a></td>
	    		<td>{{$item['Stock']}}</td>
	    	</tr>
	    	@endforeach

	    </tbody>
  	</table>
</div>

@endsection