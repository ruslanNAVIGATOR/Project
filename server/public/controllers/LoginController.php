<?php

namespace controllers;

class LoginController
{

    public function actionStartForm()
    {
        echo 'started LoginController-> actionLoginController<br>';

        require_once(ROOT . '/views/loginForm.php');
    }

    public function actionCheckLogin()
    {
        echo 'started LoginController-> actionCheckLogin<br>';
        print_r($_POST);
        require_once(ROOT . '/models/login.php');
        Login::checkLogin($_POST['login'], $_POST['password']);

    }
}