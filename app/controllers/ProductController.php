<?php

namespace App\controllers;

use App\Models\Category;
use App\Models\Product;

class ProductController
{
    public function index()
    {
        $products = Product::getProduct();
        return view('index', compact('products'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }
    public function store()
    {
        $data = $_POST;
        $file = $_FILES['image'];
        $imagePath = upload_file($file, 'products');
        $data['image'] = $imagePath;
        $errors = [];
        if (trim($data['name'] == "")) {
            $errors['name'] = 'Vui Lòng nhập name';
        }
        if ($errors) {
            return view('products.create', compact('errors'));
        }
        Product::create($data);
        return redirect('products');
    }
    public function edit($id)
    {
        $products = Product::find($id);
        $categories = Category::all();
        var_dump($products);
        return view('products.edit', compact('products', 'categories'));
    }
    public function update($id)
    {
        $product = Product::find($id);
        $data = $_POST;
        $errors = [];
        if (trim($data['name'] == "")) {
            $errors['name'] = 'Vui Lòng nhập name';
        }
        if ($errors) {
            return view('products.edit', compact('errors', 'products'));
        }
        // $data['updated_at'] = date('Y-m-d H:i:s');
        Product::update($id, $data);

        return redirect('products');
    }
    public function delete($id)
    {
        Product::destroy($id);
        return redirect('products');
    }
}
