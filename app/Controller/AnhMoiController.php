<?php
namespace Phong\PhpApiStructure\Controller;

use Phong\PhpApiStructure\Service\AnhMoiService;
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

}