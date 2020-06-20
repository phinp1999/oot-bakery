<?php

namespace App\Controller;

class Payment extends \App\Page {

    public function action_index() {

        $this->view->subview = 'payment';
        if($this->pixie->session->get("order")){
            $maDH = $this->pixie->session->get("order")[0];
            
            $oder = $this->pixie->orm->get('CtDonHang')->where("donhang_id", $maDH)->find_all()->as_array(true); 
            $spJoinCt = $this->pixie->orm->get('SanPham')->with('CtDonHang')->find_all()->as_array(true);
            $user = $this->pixie->orm->get('khachhang')->where("maKH", $this->pixie->session->get("order")[1])->find();
            $donHang = $this->pixie->orm->get('donhang')->where("maDH", $this->pixie->session->get("order")[0])->find();

            $Subtotal = 0;
            foreach($oder as $item){
                if($item->donhang_id == $maDH){
                    $Subtotal = $Subtotal + $item->thanhTien;
                }
            }
            
            $this->view->user = $user;
            $this->view->donHang = $donHang;
            $this->view->total = $Subtotal*1.1;
            $this->pixie->session->set("spJoinCt", $spJoinCt);
            $this->pixie->session->set("count",count($oder));
        }
    }

    public function action_pay(){
        $maDH = $this->pixie->session->get("order")[0];
        $diaChi = $this->request->post("diaChi");

        $this->pixie->db->query('update')->table('donHang')
        ->data(array('diaChi' => $diaChi,'ngayDH' => date("y/m/d"),'trangThai'=> '1'))
        ->where('maDH','=',$maDH)
        ->execute();

        $spJoinCt = $this->pixie->orm->get('SanPham')->with('CtDonHang')->find_all()->as_array(true);
        $donHang = $this->pixie->orm->get('donhang')->where("maDH", $maDH)->find();

        //Lấy thông tin khách hàng để gửi mail
        $maKH = $this->pixie->session->get("user")[0];
        $tenKH = $this->pixie->session->get("user")[2];
        $sdtKH = $this->pixie->session->get("user")[3];
        $emailKH = $this->pixie->session->get("user")[4];

        $title = "Đơn hàng #".$maDH." của cửa hàng OOT Bakery";
        $content = "Kính gửi Anh/chị: ".$tenKH.",\nCảm ơn anh/chị đã mua hàng tại OOT Bakery. Chúng tôi cảm thấy may mắn khi được phục vụ anh/chị.\nSau đây là hóa đơn chi tiết về đơn hàng: \n";
        $content .= "\nSố hóa đơn: ".$maDH."\tKhách hàng: ".$tenKH."\n";
        $content .= "Ngày đặt hàng: ".$donHang->ngayDH."\tĐiện thoại: ".$sdtKH."\n"; 
        $content .= "Địa chỉ giao hàng: ".$donHang->diaChi."\n"; 
        $index = 0;
        $Subtotal = 0;
        foreach ($spJoinCt as $item) {
            if($item->CtDonHang->donhang_id == $maDH){
                $index += 1;
                $content .= $index.". ".$item->tenSP.", SL: ".$item->CtDonHang->soLuong.", thành tiền: ".$item->CtDonHang->thanhTien.".\n";
                $Subtotal += $item->CtDonHang->thanhTien;
            }
        }
        $content .= "\tTổng: ".$Subtotal*1.1."đ. (Đã bao gồm thuế VAT).\n";

        $content .= "\nXin cảm ơn Quý Khách!\nBộ phận chăm sóc Khách hàng.";

        $this->pixie->email->send($emailKH, 'ootelearning@gmail.com', $title, $content);

        return $this->redirect('/payment');
    }
    public function action_reset(){
        $maKH = $this->pixie->session->get("order")[1];

        $neworder = $this->pixie->orm->get('donhang');
        $neworder->khachhang_id = $maKH;
        $neworder->diaChi = "null";
        $neworder->ngayDH = date("y-m-d");
        $neworder->trangThai = "0";
        $neworder->save();
        $order = $this->pixie->orm->get('donhang')->where('khachhang_id', '=', $maKH)->where('trangThai', '=', '0')->find();

        $this->pixie->session->set("order", array($order->maDH, $maKH));
        return $this->redirect('/');
    }
}