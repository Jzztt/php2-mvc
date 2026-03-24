@extends('layouts.app')


@section('content')
<div class="container">
    <h1>Welcome to the Home Page</h1>
</div>
<div>
    <a class="btn btn-primary" href="{{ route('products/create')}}">Create</a>
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
                <td>{{ $product -> id}}</td>
                <td>{{ $product -> name}}</td>
                <td>{{ $product -> description}}</td>
                <td>{{ $product -> price}}</td>
                <td>{{ $product -> category->name}}</td>
                <td><a href="{{route("products/{$product -> id}/delete")}}" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a></td>

                @endforeach
        </tbody>
    </table>

</div>

@endsection