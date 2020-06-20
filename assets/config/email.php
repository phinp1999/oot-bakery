<?php 

return array(
    'default' => array(

        //Type can be either 'smtp', 'sendmail' or 'native'
        'type' => 'smtp',

        //Settings for smtp connection
        'hostname' => 'smtp.gmail.com',
        'port' => '587',
        'username' => "ootelearning@gmail.com",
        'password' => "Anh670197",
        'encryption' => 'tls', // 'ssl' and 'tls' are supported
        'timeout' => null, // timeout in seconds, defaults to 5

        //Sendmail command (for sendmail), defaults to "/usr/sbin/sendmail -bs"
        'sendmail_command' => null,

        //Additional parameters for native mail() function, defaults to "-f%s"
        'mail_parameters' => null
    )
);