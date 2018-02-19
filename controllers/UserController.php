<?php

use models\User;
use controllers\SiteController;

class UserController extends SiteController
{
    public function actionList($par = false)
    {
        $user = new User();
        if ($par) $user->setUserSort($par);
        if ($_REQUEST) {
            $user->filter['name'] = $_REQUEST['name'];
            $user->filter['login'] = $_REQUEST['login'];
            $user->filter['email'] = $_REQUEST['email'];
            $user->filter['role'] = $_REQUEST['role'];
        }
        $users = $user->getUserList();
        $this->setTitle('Список пользователей');
        return $this->render('user/list',['users' => $users, 'sortrules' => $user->sortrules, 'filter' => $user->filter]);
    }
    public function actionView($id)
    {
        if ($id)
        {
            $user = new User();
            $user->getUserById($id);
        }
        $this->setTitle('Пользователь: '. $user->login);
        return $this->render('user/view', ['user' => $user]);
    }
    public function actionEdit($id)
    {
        if (($_SESSION['user']['role'] != 'a') && ($_SESSION['user']['id'] != $id)) {
            $this->setTitle('Отказано в доступе');
            return $this->render('main/accessden');
        }
        else
        {
            $user = new User();
            $user->getUserById($id);
            if (($_REQUEST) && $user->validateUser($_REQUEST))
            {
                $user->editUser($_REQUEST);
                return $this->render('user/edit', ['user' => $user, 'ans' => 'Success']);
            }
            $ans = $user->report;
            $this->setTitle('Редактировать пользователя: '. $user->login);
            return $this->render('user/edit', ['user' => $user, 'ans' => $ans]);
        }
    }
    public function actionCreate()
    {
        if ($_SESSION['user']['role'] != 'a'){
            $this->setTitle('Отказано в доступе');
            return $this->render('main/accessden');
        }
        else
        {
            $user = new User();
            if (($_REQUEST) && $user->validateUser($_REQUEST))
            {
                $user->createUser($_REQUEST);
                header('Location: /user');
            }
            else $ans = $user->report;
            $this->setTitle('Создать нового пользователя');
            return $this->render('user/create', ['ans' => $ans]);
        }
    }
    public function actionDelete($id)
    {
        if ($_SESSION['user']['role'] != 'a'){
            $this->setTitle('Отказано в доступе');
            return $this->render('main/accessden');
        }
        else
        {
            if($id)
            {
                User::deleteUser($id);
                header('Location: /user');
            }
        }
    }
}