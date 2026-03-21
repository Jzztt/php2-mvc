<?php

namespace App\Models;

use App\Models\BaseModel;


class Product extends BaseModel
{
    protected $table = "products";

    public static function getProduct()
    {
        $model = new static();
        $sql = "SELECT products.*, categories.name as category_name FROM products JOIN categories ON products.category_id = categories.id";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll();
        return $results;
    }
}
