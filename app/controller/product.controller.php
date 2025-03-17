<?php
require_once __DIR__ . '/../service/product.service.php';

class ProductController
{
   private $productService;
   public function __construct(ProductService $productService)
   {
       $this->productService = $productService;
   }

   public function getProducts()
   {
       $products = $this->productService->getProducts();
       header('Content-Type: application/json');
       echo json_encode($products);
   }

   public function addProduct()
   {
      $data = json_decode(file_get_contents('php://input'), true);
      $name = $data['Name'];
      $description = $data['Description'];
      $price = $data['Price'];
      $quantity = $data['Quantity'];
      $productID = $this->productService->addProduct($name, $description, $price, $quantity);
      header('Content-Type: application/json');
      echo json_encode(['message' => 'Product added', 'id' => $productID]);
   }
}