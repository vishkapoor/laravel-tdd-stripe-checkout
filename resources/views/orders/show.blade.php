@extends('layouts/app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center">
            <hr/>
            <div class="alert alert-success">
                <strong>Success! </strong> Order for {{ $order->email }} confirmed.
            </div>
            <hr/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <div>
                        <div class="row">
                            <div class="col-md-12">
                                <h5>Order - Products</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @foreach($order->products as $product)
                        <div class="row">
                            <div class="col-md-2">
                                <img class="img-fluid" src="http://via.placeholder.com/100x70"></img>
                            </div>
                            <div class="col-md-8">
                                {{ $product->name }}
                            </div>
                            <div class="col-md-2">
                                <div style="text-align: center">
                                    &pound;{{ $product->getPrice() }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer text-muted">
                    <div class="row text-center">
                        <div class="col-md-12">
                            <div class="text-right">
                                <h5>
                                    <strong>Total: </strong>
                                    &pound;{{  $order->totalPrice() }}
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection