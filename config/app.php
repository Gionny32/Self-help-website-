<?php

return [
    'database' => [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'register',
        'username' => 'root',
        'password' => ''
    ],
    'mail' => [
        'transport' => 'smtp',
        'encrption' => 'tls',
        'port' => 587,
        'host' => 'smtp.gmail.com',
        'username' => 'giovannisturiale2@gmail.com',
        'password' => 'Gionny32',
        'from' => 'giovannisturiale2@gmail.com',
        'sender_name' => 'User Authentication'
    ],
  //  'recaptcha' => [
    //    'key' => 'your_app_key',
      //  'secret' => 'your_app_secret',
    //]
];
