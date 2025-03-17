<?php
// namespace Phong\PhpApiStructure\model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image','quantity'];
    public $timestamps = true;
}

?>