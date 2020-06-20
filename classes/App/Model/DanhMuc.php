<?php
namespace App\Model;

//ORM will guess the name of the table
//using the name of the class
class DanhMuc extends \PHPixie\ORM\Model {
    public $id_field='maDanhMuc';
    public $table='danhmuc';
}