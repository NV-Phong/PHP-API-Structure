<?php
namespace Phong\Model;
use PDO;

class Category
{
   private $conn;
   private $table = "CATEGORY";

   public function __construct($db)
   {
      $this->conn = $db;
   }

   public function create($name, $description, $isDeleted)
   {
      $sql = "INSERT INTO {$this->table} (IDCategory, CategoryName, CategoryDescription, IsDeleted) 
              VALUES (UUID(), :name, :description, :isDeleted)";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":description", $description);
      $stmt->bindParam(":isDeleted", $isDeleted, PDO::PARAM_BOOL);
      return $stmt->execute();
   }

   public function getAll()
   {
      $sql = "SELECT * FROM {$this->table} WHERE IsDeleted = 0";
      $stmt = $this->conn->query($sql);
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
   }

   public function getById($id)
   {
      $sql = "SELECT * FROM {$this->table} WHERE IDCategory = :id AND IsDeleted = 0";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
   }

   public function update($id, $name, $description, $isDeleted)
   {
      $sql = "UPDATE {$this->table} 
              SET CategoryName = :name, CategoryDescription = :description, IsDeleted = :isDeleted 
              WHERE IDCategory = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":description", $description);
      $stmt->bindParam(":isDeleted", $isDeleted, PDO::PARAM_BOOL);
      return $stmt->execute();
   }

   public function delete($id)
   {
      $sql = "UPDATE {$this->table} SET IsDeleted = 1 WHERE IDCategory = :id";
      $stmt = $this->conn->prepare($sql);
      $stmt->bindParam(":id", $id);
      return $stmt->execute();
   }
}
