@extends('layouts/app')
@section('content')
<div class="container-fluid">
    <div class="row">
        @foreach($products as $product)
            <div class="col-md-3" style="margin-bottom: 15px">
                <div class="img-thumbnail">
                    <img src="http://via.placeholder.com/300x300" alt="" class="img-fluid">
                    <div class="caption">
                        <div class="row">
                            <div class="col-md-12">
                                <h5> {{ $product->name }} </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                &pound;{{ $product->getPrice() }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <form action="/cart/{{$product->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-outline-success">Add To Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection