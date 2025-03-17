<?php
namespace Phong\PhpApiStructure\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'price', 'image','quantity'];
    public $timestamps = true;
}

?>