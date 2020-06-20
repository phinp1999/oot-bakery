<?php

namespace App\Controller;

class Cart extends \App\Page {

    public function action_index() {

        $this->view->subview = 'cart';
        if($this->pixie->session->get("order")){
            $maDH = $this->pixie->session->get("order")[0];
            
            $oder = $this->pixie->orm->get('CtDonHang')->where("donhang_id", $maDH)->find_all()->as_array(true);
            
            $spJoinCt = $this->pixie->orm->get('SanPham')->with('CtDonHang')->find_all()->as_array(true);

            $Subtotal = 0;
            foreach($oder as $item){
                if($item->donhang_id == $maDH){
                    $Subtotal = $Subtotal + $item->thanhTien;
                }
            }

            $this->view->subtotal = $Subtotal;
            $this->pixie->session->set("spJoinCt", $spJoinCt);
            $this->pixie->session->set("count",count($oder));
        }
    }

    public function action_inc() {
        $maSP = $this->request->param('id');
        $maDH = $this->pixie->session->get("order")[0];

        $item = $this->pixie->orm->get('CtDonHang') ->where('donhang_id','=',$maDH)->where('sanpham_id','=', $maSP)->find();

        $sanpham = $this->pixie->orm->get('SanPham')->where("maSP",$maSP)->find();

        $this->pixie->db->query('update')->table('CtDonHang')
        ->data(array('soLuong' => $item->soLuong + 1,'thanhTien' => $sanpham->giaSP*($item->soLuong + 1)))
        ->where('donhang_id','=',$maDH)->where('sanpham_id','=', $maSP)
        ->execute();
        
        return $this->redirect('/cart');
    }

    public function action_dec() {

        $maSP = $this->request->param('id');
        $maDH = $this->pixie->session->get("order")[0];

        $item = $this->pixie->orm->get('CtDonHang') ->where('donhang_id','=',$maDH)->where('sanpham_id','=', $maSP)->find();

        $sanpham = $this->pixie->orm->get('SanPham')->where("maSP",$maSP)->find();

        if($item->soLuong > 1){
            $this->pixie->db->query('update')->table('CtDonHang')
            ->data(array('soLuong' => $item->soLuong - 1,'thanhTien' => $sanpham->giaSP*($item->soLuong - 1)))
            ->where('donhang_id','=',$maDH)->where('sanpham_id','=', $maSP)
            ->execute();
        }else if($item->soLuong == 1){
            $this->deleteItem($maSP);
        }
        
        return $this->redirect('/cart');
    }

    public function action_customValue(){
        $maDH = $this->pixie->session->get("order")[0];

        $CtDonHang = $this->pixie->orm->get('CtDonHang')->where('donhang_id','=',$maDH)->find_all()->as_array(true);

        foreach($CtDonHang as $item){
            $sanpham = $this->pixie->orm->get('SanPham')->where("maSP",$item->sanpham_id)->find();

            $soLuong = $this->request->post($item->sanpham_id);

            if( $soLuong > 0){
                $this->pixie->db->query('update')->table('CtDonHang')
                ->data(array('soLuong' => $soLuong,'thanhTien'=> $sanpham->giaSP*$soLuong))
                ->where('sanpham_id','=', $item->sanpham_id)
                ->execute();
            }else if($soLuong == 0){
                $this->deleteItem($item->sanpham_id);
            }
        }
        
        return $this->redirect('/cart');
    }

    public function action_delete(){
        $maSP = $this->request->param('id');
        $this->deleteItem($maSP);
        return $this->redirect('/cart');
    }
    
    function deleteItem($maSP){
        $maDH = $this->pixie->session->get("order")[0];
        
        $this->pixie->db->query('delete')->table('CtDonHang')
        ->where('donhang_id','=',$maDH)->where('sanpham_id','=', $maSP)
        ->execute();
    }
}