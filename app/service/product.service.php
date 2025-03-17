<?php
// namespace Phong\PhpApiStructure\service;

require_once __DIR__ . '/../../config/database.config.php';
require_once __DIR__ . '/../model/product.model.php';

class ProductService
{
   public function getProducts()
   {
      return Product::all();
   }

   public function addProduct($name, $description, $price, $image, $quantity)
{
   $product = new Product();
   $product->name = $name;
   $product->description = $description;
   $product->price = $price;
   $product->image = $image;
   $product->quantity = $quantity;
   $product->save();
   return $product->id;
}

}
