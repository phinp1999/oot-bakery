<?php

namespace App\Controller;

class TrangChu extends \App\Page {

    public function action_index() {

        $this->view->subview = 'view';

        $this->view->categories = $this->pixie->orm->get('danhmuc')->find_all();

        $id = $this->request->param('id');

        $this->view->category = $this->pixie->orm->get('danhmuc', $id ? $id : 1);

        $this->view->products = $this->pixie->orm->get('sanpham')->where('danhmuc_id', $id ? $id : 1)->find_all();
        
        if($this->pixie->session->get("order")){
            $maDH = $this->pixie->session->get("order")[0];
            
            $oder = $this->pixie->orm->get('CtDonHang')->where("donhang_id", $maDH)->find_all()->as_array(true);
            
            
            $spJoinCt = $this->pixie->orm->get('SanPham')->with('CtDonHang')->find_all()->as_array(true);
            
            $this->pixie->session->set("spJoinCt", $spJoinCt);
            $this->pixie->session->set("count",count($oder));
        }
    }

    public function action_addcart() {
        $maDH = $this->pixie->session->get("order")[0];

        $maSP = $this->request->param('id');

        $order = $this->pixie->orm->get('CtDonHang')->where("donhang_id", $maDH)->find_all()->as_array(true);
       
        $flag = false;
        foreach($order as $item){
            if($item->sanpham_id == $maSP){
                $flag = true;
                break;
            }
        }
        

        if($flag == false){
            $sanpham = $this->pixie->orm->get('SanPham')->where("maSP",$maSP)->find();
            $CtDonHang = $this->pixie->orm->get('CtDonHang');

            $CtDonHang->donhang_id = $maDH;
            $CtDonHang->sanpham_id = $maSP;
            $CtDonHang->soLuong = 1;
            $CtDonHang->ThanhTien = $sanpham->giaSP;
            
            $CtDonHang->save();
        }

        return $this->redirect('/');
    }
}