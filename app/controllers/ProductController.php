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
        echo "save product";
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
        echo 'delete product' . $id;
    }
}
