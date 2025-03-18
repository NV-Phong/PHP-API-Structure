<?php
namespace Phong\PhpApiStructure\Model;

class User extends Entity
{
    protected $table = 'USERS';
    protected $primaryKey = 'IDUser';
    public $timestamps = false;
    protected $fillable = ['UserName', 'Email', 'PhoneNumber', 'IsDeleted'];

}