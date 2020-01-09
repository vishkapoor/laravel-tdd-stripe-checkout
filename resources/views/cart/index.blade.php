@extends('layouts/app')
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card card-info">
				<div class="card-header">
					<div>
						<div class="row">
							<div class="col-md-6">
								<h5>Shopping Cart</h5>
							</div>
							<div class="col-md-6">
								<a href="/products" class="btn btn-outline-primary float-right">
									Continue Shopping
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body">
					@if(!isset($cart->items))
						<h5>Your cart is empty.</h5>
					@else
						@foreach($cart->items as $item)
							<div class="row">
								<div class="col-md-2">
									<img class="img-fluid" src="http://via.placeholder.com/100x70"></img>
								</div>
								<div class="col-md-8">
									{{ $item->name }}
								</div>
								<div class="col-md-2">
									<div style="text-align: center">
										&pound;{{ $item->getPrice() }}
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
				<div class="card-footer text-muted">
					<div class="row text-center">
						<div class="col-md-9">
							<div class="text-right">
								<h5>
									<strong>Total: </strong>
									&pound;{{  $cart->totalPrice() }}
								</h5>
							</div>
						</div>
						<div class="col-md-3">
							<form action="/orders" method="POST">
								@csrf
								<script
									src="https://checkout.stripe.com/checkout.js"
									class="stripe-button"
									data-key="{{ config('stripe.api_key') }}"
									data-amount="{{ $cart->total() }}"
									data-name="{{config('app.name')}}"
									data-description="Test purchase"
									data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
									type="text/javascript"></script>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection