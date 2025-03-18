<?php
namespace Phong\PhpApiStructure\Model;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name', 'description'];
    public $timestamps = true;

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }
}