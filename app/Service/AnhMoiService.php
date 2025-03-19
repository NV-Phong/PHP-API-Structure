<?php
namespace WorkSpace\Service;

use WorkSpace\Model\AnhMoi;

class AnhMoiService
{
    public function getAll()
    {
        return AnhMoi::where('IsDeleted', false)->get();
    }

    public function getByID($id)
    {
        return AnhMoi::where('IsDeleted', false)->findOrFail($id);
    }

    public function addNew($data)
    {
        return AnhMoi::create($data);
    }
}