<?php

namespace App\Models;

use PDO;
use PDOException;

class BaseModel
{
    protected $conn;
    protected $table = "";
    public function __construct()
    {
        $servername = $_ENV['HOST'];
        $dbname = $_ENV['DBNAME'];
        $username = $_ENV['USERNAME'];
        $password = $_ENV['PASSWORD'];
        try {
            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function all()
    {
        $model = new static();
        $sql = "SELECT * FROM {$model->table}";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_CLASS);
        return $result;
    }
}
