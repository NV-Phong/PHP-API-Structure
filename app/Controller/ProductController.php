<?php
namespace Phong\PhpApiStructure\Controller;

use Phong\PhpApiStructure\Service\ProductService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ProductController
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function getProducts(): JsonResponse
    {
        $products = $this->productService->getProducts();
        return new JsonResponse($products);
    }

    public function addProduct(Request $request): JsonResponse
    {
        $name = $request->input('Name');
        $description = $request->input('Description');
        $price = $request->input('Price');
        $image = $request->input('Image');
        $quantity = $request->input('Quantity');

        // Kiểm tra dữ liệu đầu vào
        if (!$name || !$price || !$quantity) {
            return new JsonResponse(
                ['error' => 'Tên, Giá và Số lượng là bắt buộc'],
                400 // Yêu cầu không hợp lệ
            );
        }

        $productId = $this->productService->addProduct($name, $description, $price, $image, $quantity);
        return new JsonResponse([
            'message' => 'Sản phẩm đã được thêm',
            'id' => $productId
        ], 201); // Tạo thành công
    }
}