@extends('layouts/app')

@section('content')

<div class="row">
	<div class="col-md-12">
		<h3>Cart Products</h3>
	</div>
</div>
@foreach($cart->items as $item)
	<div class="row">
		<div class="col-md-10">
			{{ $item->name }}
		</div>
		<div class="col-md-2">
			{{ $item->getPrice() }}
		</div>
	</div>
@endforeach
@endsection