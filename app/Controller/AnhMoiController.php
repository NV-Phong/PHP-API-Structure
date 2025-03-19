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
      ], 200);
   }
}