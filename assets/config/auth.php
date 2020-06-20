<?php

return array(

'default' => array(

    'model' => 'KhachHang',

    //Login providers

    'login' => array(

        'password' => array(

            'login_field' => 'taiKhoan',

            //Make sure that the corresponding field in the database

            //is at least 50 characters long

            'password_field' => 'matKhau',

            'login_token_field' => 'remember_me', //Token that the 'remember me' feature uses
            
			'login_token_lifetime' => 63072000,	//Amount in seconds the cookie token is valid

        )

    )

)

);