@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welcome to the create Products Page</h1>
</div>
<div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div>
            <label for="name">Name</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description">
        </div>
        <div>
            <label for="price">Price</label>
            <input type="text" name="price">
        </div>
        <div>
            <label for="category">Category</label>
            <select name="category_id" id="">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary" type="submit" name="submit">Submit</button>
    </form>
</div>
@endsection