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

    public static function create($data)
    {
        $model = new static();
        $colums = array_keys($data);
        $columName = "`" . implode("`, `", $colums) . "`";
        $columValues = ":" . implode(", :", $colums);
        $sql = "INSERT INTO {$model->table} ({$columName}) VALUES ({$columValues})";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute($data);
    }

    public static function destroy($id){
        $model = new static();
        $sql = "DELETE FROM {$model->table} WHERE id = :id";
        $stmt = $model->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
    }
}
