<?php
namespace Phong\PhpApiStructure\Model;

class User extends Entity
{
    protected $table = 'USERS';
    protected $primaryKey = 'IDUser';
    public $timestamps = true;
    protected $fillable = ['Name', 'Email', 'PhoneNumber', 'IsDeleted'];

}