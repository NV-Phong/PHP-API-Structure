<?php
namespace Phong\PhpApiStructure\Model;

class AnhMoi extends Entity
{
    protected $table = 'ANHMOI';
    protected $primaryKey = 'IDAnhMoi';
    public $timestamps = false;
    protected $fillable = ['RealName', 'BirthDate', 'Gender', 'IQ','IsDeleted'];

}