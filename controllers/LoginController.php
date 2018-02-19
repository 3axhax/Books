<?php

use models\User;
use controllers\SiteController;

class LoginController extends SiteController
{
    public function actionIndex()
    {
        if ($_REQUEST) {
            $login = [  'login' => $_REQUEST['userlogin'],
                        'password' => $_REQUEST['userpassword']];

            $ans = User::checkUsersAuth($login);
        }
        else
        {
            $ans = true;
        }
        $this->setTitle('Вход');
        return (!$ans) ? header('Location: /user') : $this->render('login/index', ['ans' => $ans]);
    }
    public function actionLogout()
    {
        User::setUserLogout();
        return header('Location: /login');
    }
}