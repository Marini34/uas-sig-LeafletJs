@extends('layout')

@section('content')
<h1>Products</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary">Create New Product</a>
@if ($message = Session::get('success'))
    <div class="alert alert-success mt-3">{{ $message }}</div>
@endif
<table class="table table-bordered mt-3">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $index => $product)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $product['name'] }}</td>
        <td>{{ $product['description'] }}</td>
        <td>{{ $product['price'] }}</td>
        <td>
            <form action="{{ route('products.destroy', $index) }}" method="POST">
                <a class="btn btn-info" href="{{ route('products.show', $index) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('products.edit', $index) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection
