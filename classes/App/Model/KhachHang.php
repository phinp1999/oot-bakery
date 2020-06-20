<?php
namespace App\Model;

//ORM will guess the name of the table
//using the name of the class
class KhachHang extends \PHPixie\ORM\Model {
    public $id_field='maKH';
    public $table='khachhang';
    
}