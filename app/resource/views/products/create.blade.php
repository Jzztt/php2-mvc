@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the create Products Page</h1>
</div>
<div>
    <form action="{{route('products/store')}}" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
            @isset($errors['name'])
            <p class="text-danger"> {{ $errors['name'] }}</p>
            @endisset
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description">
            @isset($errors['description'])
            <p class="text-danger"> {{ $errors['description'] }}</p>
            @endisset
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price">
            @isset($errors['price'])
            <p class="text-danger"> {{ $errors['price'] }}</p>
            @endisset
        </div>
        <div>
            <label for="image">Image</label>
            <input type="file" name="image" accept="image/*">
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>
</div>
@endsection