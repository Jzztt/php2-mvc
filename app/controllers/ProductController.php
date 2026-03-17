<?php

namespace App\controllers;


class ProductController
{
    public function index()
    {
        $products = [];
        return view('index', compact('products'));
    }
    public function create()
    {
        echo "create product";
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
