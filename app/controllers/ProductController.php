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
        echo 'edit product' . $id;
    }
    public function update($id)
    {
        echo 'update product' . $id;
    }
    public function delete($id)
    {
        Product::destroy($id);
        return redirect('products');
    }
}
