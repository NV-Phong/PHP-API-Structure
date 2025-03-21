<?php
require_once __DIR__ . '/env.config.php';

class Database
{
   private $host;
   private $port;
   private $dbname;
   private $username;
   private $password;

   public function __construct()
   {
      global $ENVCONFIG;
      $this->host = $ENVCONFIG['DB']['HOST'] ?? 'localhost';
      $this->port = $ENVCONFIG['DB']['PORT'] ?? '3306';
      $this->dbname = $ENVCONFIG['DB']['NAME'] ?? 'hello_world';
      $this->username = $ENVCONFIG['DB']['USERNAME'] ?? 'root';
      $this->password = $ENVCONFIG['DB']['PASSWORD'] ?? '';
   }

   public function connect()
   {
      try {
         $pdo = new PDO(
            "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4",
            $this->username,
            $this->password
         );
         return $pdo;
      } catch (PDOException $e) {
         die("Lỗi kết nối: " . $e->getMessage());
      }
   }
}