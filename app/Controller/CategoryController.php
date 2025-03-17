<?php
namespace Phong\PhpApiStructure\Controller;
use Phong\PhpApiStructure\Service\CategoryService;

class CategoryController
{
   private $categoryService;
   public function __construct(CategoryService $categoryService)
   {
       $this->categoryService = $categoryService;
   }

   public function getCategories()
   {
       $category = $this->categoryService->getCategories();
       header('Content-Type: application/json');
       echo json_encode($category);
   }

   public function addCategory()
   {
      $data = json_decode(file_get_contents('php://input'), true);
      $name = $data['Name'];
      $description = $data['Description'];
      $categoryID = $this->categoryService->addCategory($name, $description);
      header('Content-Type: application/json');
      echo json_encode(['message' => 'Category added', 'id' => $categoryID]);
   }
}