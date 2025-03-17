<?php
namespace Phong\PhpApiStructure\Service;
use Phong\PhpApiStructure\Model\Category;

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
