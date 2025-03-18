<?php
namespace Phong\PhpApiStructure\Controller;

use Phong\PhpApiStructure\Service\CategoryService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CategoryController
{
    private CategoryService $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function getCategories(): JsonResponse
    {
        $categories = $this->categoryService->getCategories();
        return new JsonResponse($categories);
    }

    public function addCategory(Request $request): JsonResponse
    {
        $name = $request->input('Name');
        $description = $request->input('Description');

        // Kiểm tra dữ liệu đầu vào
        if (!$name) {
            return new JsonResponse(
                ['error' => 'Tên danh mục là bắt buộc'],
                400 // Yêu cầu không hợp lệ
            );
        }

        $categoryID = $this->categoryService->addCategory($name, $description);
        return new JsonResponse([
            'message' => 'Danh mục đã được thêm',
            'id' => $categoryID
        ], 201); // Tạo thành công
    }
}