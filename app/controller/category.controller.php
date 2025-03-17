<?php
// namespace Phong\PhpApiStructure\controller;

require_once __DIR__ . '/../service/category.service.php';

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
//--------------------------------------------------MVC--------------------------------------------------//CONFIG--------------------------------------------------//
   public function displayCategories()
    {
        $category = $this->categoryService->getCategories();
        include __DIR__ . '/../../view/category/list.category.php';
    }

   public function displayAddCategories()
    {
        include __DIR__ . '/../../view/category/add.category.php';
    }
}