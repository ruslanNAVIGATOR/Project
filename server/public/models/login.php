<?php

namespace controllers;

use components\Singleton;

class Login
{
    public static function checkLogin($login, $password)
    {

        echo 'started login-> CheckLogin<br>';
        require(ROOT . '/components/Singleton.php');
        $connection = Singleton::getInstance();
        $pdo=$connection->connectBD();

        $userPasswordDB = $pdo->query("SELECT password  FROM users WHERE login = '".$login."'")->fetchAll();


        if ($password == $userPasswordDB[0]['password']) {
            echo 'login is okey';

        } else {
            echo 'login is bad';
        }
    }


}