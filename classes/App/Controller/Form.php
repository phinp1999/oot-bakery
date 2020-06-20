<?php

namespace App\Controller;

class Form extends \App\Page
{

    public function action_index()
    {

        if ($this->logged_in()) {
            return $this->redirect('/');
        }

        $this->view->subview = 'form';
    }

    public function action_login()
    {

        if ($this->logged_in()) {
            return $this->redirect('/');
        }

        if ($this->request->method == 'POST') {

            $login = $this->request->post('username');

            $password = $this->request->post('password');

            //Attempt to login the user using his

            //username and password

            $logged = $this->pixie->auth

                ->provider('password')

                ->login($login, $password);

            //On successful login redirect the user to

            //our protected page

            if ($logged) {
                // PUT

                $user = $this->pixie->orm->get('khachhang')->where('taiKhoan', '=', $login)->find();

                $hash = $this->pixie->auth->provider('password')->hash_password($password);

                $user->matKhau = $hash;

                $user->save();
                // PUT

                // Create Order

                $order = $this->pixie->orm->get('donhang')->where('khachhang_id', $user->maKH)->where('trangThai', '0')->find();
                if ($order->loaded()) {
                    $order_array = array($order->maDH, $order->khachhang_id);
                } else {
                    // $date = getdate();

                    $neworder = $this->pixie->orm->get('donhang');

                    $neworder->khachhang_id = $user->maKH;
                    $neworder->diaChi = "null";
                    $neworder->ngayDH = date("y-m-d");
                    $neworder->trangThai = "0";
                    $neworder->save();
                    $order = $this->pixie->orm->get('donhang')->where('khachhang_id', $user->maKH)->where('trangThai', '0')->find();
                    $order_array = array($order->maDH, $order->khachhang_id);
                }

                $this->pixie->session->set("order",  $order_array);

                // End Order

                $user_array = array($user->maKH, $user->taiKhoan, $user->hoTen, $user->dienThoai, $user->email);

                $this->pixie->session->set("user", $user_array);


                return $this->redirect('/');
            }
        }


        $this->view->username_2 = $this->request->post('username');

        $this->view->handleErr = "
        Tên đăng nhập hoặc tài khoản của bạn không chính xác";

        $this->view->subview = 'form';
    }

    public function action_register()
    {

        $activeTab = 1;

        if ($this->logged_in()) {
            return $this->redirect('/');
        }

        if ($this->request->method == 'POST') {

            $username = $this->request->post('username');

            $password = $this->request->post('password');

            $fullname = $this->request->post('fullname');

            $email = $this->request->post('email');

            $phone = $this->request->post('phone');

            $validator = $this->pixie->validate->get($this->request->post());

            $validator->field('username')->rules('filled');

            $validator->field('password')->rule('filled')->rule('min_length', 8);

            $validator->field('email')->rules('filled');

            $validator->field('username', true)->rule('callback', function () {

                $username = $this->request->post('username');

                $user = $this->pixie->orm->get('khachhang')->where('taiKhoan', '=', $username)->find();

                if (isset($user->maKH)) {

                    return false;
                }

                return true;
            });

            if ($validator->valid()) {

                $user = $this->pixie->orm->get('khachhang');

                $user->taiKhoan = $this->request->post('username');

                $password = $this->request->post('password');

                $hash = $this->pixie->auth->provider('password')->hash_password($password);

                $user->matKhau = $hash;

                $user->hoTen = $this->request->post('fullname');

                $user->email = $this->request->post('email');

                $user->dienthoai = $this->request->post('phone');

                // $this->pixie->email->send('s2bongma2s@gmail.com', 'ootelearning@gmail.com', "Hello","Your veritified code is 113");

                $user->save();

                $this->view->msgAlert = true;

                $this->view->subview = "form";

                return;
            } else {

                $arrayErr = $validator->errors();
                $nameErr = $passErr = $emailErr = "";

                foreach ($arrayErr as $key => $value) {
                    if ($key == "username") {
                        foreach ($value as $item) {
                            if ($item == "filled") {
                                $nameErr = "
                                tên người dùng là bắt buộc.";
                                break;
                            }

                            if ($item == "callback") {
                                $nameErr = "Tên người dùng này đã được sử dụng.";
                                break;
                            }
                        }
                    }

                    if ($key == "password") {
                        foreach ($value as $item) {
                            if ($item == "filled") {
                                $passErr = "Mật khẩu là bắt buộc.";
                                break;
                            }

                            if ($item == "min_length") {
                                $passErr = "Mật khẩu phải dài ít nhất 8 ký tự.";
                                break;
                            }
                        }
                    }

                    if ($key == "email") {
                        foreach ($value as $item) {
                            if ($item == "filled") {
                                $emailErr = "Email thì cần thiết.";
                                break;
                            }
                        }
                    }
                }

                $this->view->username = $username;
                $this->view->fullname = $fullname;
                $this->view->email = $email;
                $this->view->phone = $phone;
                $this->view->nameErr = $nameErr;
                $this->view->passErr = $passErr;
                $this->view->emailErr = $emailErr;
            }
        }

        $this->view->activeTab = $activeTab;
        $this->view->subview = 'form';
    }

    public function action_logout()
    {

        $this->pixie->auth->logout();

        $this->pixie->session->reset();

        $this->redirect('/form');
    }
}
