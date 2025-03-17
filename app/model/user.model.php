<?php
namespace Phong\PhpApiStructure\model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = ['name', 'email'];
    public $timestamps = true;
}

?>