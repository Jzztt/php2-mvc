@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the Edit Products Page</h1>
</div>
<div>
    <form action="{{route("products/{$products->id}/update")}}" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $products->name }}">
            @isset($errors['name'])
            <p class="text-danger"> {{ $errors['name'] }}</p>
            @endisset
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" value="{{$products->description }}">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price" value="{{$products->price }}">
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $category->id == $products->category_id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection