<?php
namespace Phong\Controller\View;
use Phong\Model\Category;
use PDO;

class CategoryController
{
   private $categoryModel;

   public function __construct(PDO $db)
   {
      $this->categoryModel = new Category($db);
   }

   public function index()
   {
      $categories = $this->categoryModel->getAll();
      include "../views/category/list.php";
   }

   public function show($id)
   {
      $category = $this->categoryModel->getById($id);
      if ($category) {
         include "../views/categories/show.php";
      } else {
         echo "Không tìm thấy danh mục";
      }
   }
}
