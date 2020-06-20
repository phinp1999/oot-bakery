<?php
namespace App\Model;

//ORM will guess the name of the table
//using the name of the class
class SanPham extends \PHPixie\ORM\Model {
    public $id_field='maSP';
    public $table='sanpham';
    public $has_one =array("CtDonHang");
}