@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Welcome to the Home Page</h1>
</div>
<div>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product['id'] }}</td>
                <td>{{ $product['name'] }}</td>
                <td>{{ $product['description'] }}</td>
                <td>{{ $product['price'] }}</td>
                <td>{{ $product['category_name'] }}</td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                    <button class="btn btn-warning">Update</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection