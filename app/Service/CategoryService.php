<?php
namespace Phong\PhpApiStructure\Service;

use Phong\PhpApiStructure\Model\Category;

require_once __DIR__ . '/../../config/database.config.php';

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
