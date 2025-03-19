<?php
namespace WorkSpace\Controller;
use WorkSpace\Service\AnhMoiService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AnhMoiController
{
   private AnhMoiService $AnhMoiService;

   public function __construct(AnhMoiService $AnhMoiService)
   {
      $this->AnhMoiService = $AnhMoiService;
   }

   public function getAnhMois(): JsonResponse
   {
      $anhmois = $this->AnhMoiService->getAll();
      return new JsonResponse([
         'message' => 'Danh sách Anh Moi',
         'data' => $anhmois
      ]);
   }

   public function getAnhMoiByID($id): JsonResponse
   {
      $anhmoi = $this->AnhMoiService->getByID($id);
      if ($anhmoi) {
         return new JsonResponse([
            'message' => 'Anh Moi',
            'data' => $anhmoi
         ]);
      } else {
         return new JsonResponse([
            'message' => 'Anh Moi không tồn tại',
         ]);
      }
   }

   public function createAnhMoi(Request $request): JsonResponse
   {
      $anhMoi = $this->AnhMoiService->addNew($request->json()->all());
      return new JsonResponse([
         'message' => 'Tạo Anh Moi thành công',
         'data' => $anhMoi
      ], 201);
   }

}