<?php

namespace App\Models;

use App\Models\BaseModel;
use PDO;

class Product extends BaseModel
{
    protected $table = "products";

    public static function getProduct()
    {
        $model = new static();
        $sql = "SELECT products.*, categories.name as category_name FROM products JOIN categories ON products.category_id = categories.id ORDER BY products.id ASC";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $results;
    }
}
