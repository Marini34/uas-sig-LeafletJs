@extends('layout')

@section('content')
<h1> Show Product</h1>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $product['name'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Description:</strong>
            {{ $product['description'] }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Price:</strong>
            {{ $product['price'] }}
        </div>
    </div>
</div>
<a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
@endsection
