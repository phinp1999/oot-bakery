<?php
namespace App\Model;

//ORM will guess the name of the table
//using the name of the class
class CtDonHang extends \PHPixie\ORM\Model {
    public $id_field="donhang_id";
    public $table='ctdonhang';
    public $has_one =array("SanPham");
}