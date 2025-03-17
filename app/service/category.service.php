<?php
// namespace Phong\PhpApiStructure\service;

require_once __DIR__ . '/../../config/database.config.php';
require_once __DIR__ . '/../model/category.model.php';

class CategoryService
{
   public function getCategories()
   {
      return Category::all();
   }

   public function addCategory($name, $description)
{
   $category = new Category();
   $category->name = $name;
   $category->description = $description;
   $category->save();
   return $category->id;
}

}
