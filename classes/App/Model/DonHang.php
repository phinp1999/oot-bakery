<?php
namespace App\Model;

//ORM will guess the name of the table
//using the name of the class
class DonHang extends \PHPixie\ORM\Model {
    public $id_field='khachhang_id';
    public $table='DonHang';
    public $has_one =array("CtDonHang");
}