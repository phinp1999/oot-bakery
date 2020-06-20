<?php

namespace App\Controller;

class Profile extends \App\Page
{

    public function action_index()
    {

        $this->view->tab = 1;
        $this->view->subview = 'profile';
        $user_array = $this->pixie->session->get('user');

        if ($user_array) {
            $login = $user_array[0];
            $orderList = $this->pixie->orm->get('DonHang')->where('khachhang_id', $login)->where('trangThai', '1')->find_all()->as_array(true);
        }

        $spJoinCt = $this->pixie->orm->get('SanPham')->with('CtDonHang')->find_all()->as_array(true);

        $this->pixie->session->set("spJoinCt", $spJoinCt);
        $this->view->orderHistory = $orderList;
    }

    public function action_editp()
    {
        if ($this->request->method == 'POST') {
            $password = $this->request->post('password');
            $Npassword = $this->request->post('matKhauMoi');
            $CNpassword = $this->request->post('matKhauXacNhan');

            $user_array = $this->pixie->session->get('user');
            if ($user_array) {
                $login = $user_array[1];

                // $this->view->ok =$user->matKhau;
                $logged = $this->pixie->auth

                    ->provider('password')

                    ->login($login, $password);
                if ($logged) {

                    if ($Npassword == $CNpassword) {
                        $user = $this->pixie->orm->get('khachhang')->where('taiKhoan', '=', $login)->find();

                        $hash = $this->pixie->auth->provider('password')->hash_password($Npassword);

                        $user->matKhau = $hash;

                        $user->save();
                        return $this->redirect('/profile');
                    } else {
                        $this->view->alert_1 = "Mật khẩu xác nhận không khớp";
                    }
                } else {
                    $this->view->alert = "Mật khẩu của bạn sai";
                }
            }
        }
        if ($user_array) {
            $login = $user_array[0];
            $orderList = $this->pixie->orm->get('DonHang')->where('khachhang_id', $login)->where('trangThai', '1')->find_all()->as_array(true);
        }

        $spJoinCt = $this->pixie->orm->get('SanPham')->with('CtDonHang')->find_all()->as_array(true);

        $this->pixie->session->set("spJoinCt", $spJoinCt);
        $this->view->orderHistory = $orderList;
        $this->view->tab = 2;
        $this->view->subview = 'profile';
    }
    public function action_editinfo()
    {
        $this->view->tab = 3;
        if ($this->request->method == 'POST') {


            $user_array = $this->pixie->session->get('user');
            if ($user_array) {
                $login = $user_array[1];
                $user = $this->pixie->orm->get('khachhang')->where('taiKhoan', '=', $login)->find();
                $user->hoTen = $this->request->post('fullName');
                $user->dienthoai = $this->request->post('phone');
                $user->save();
                $user_array = array($user->maKH, $user->taiKhoan, $user->hoTen, $user->dienThoai, $user->email);

                $this->pixie->session->set("user", $user_array);
                return $this->redirect('/profile');
            }
        }
        $this->view->tab = 3;
        $this->view->subview = 'profile';
    }
}
