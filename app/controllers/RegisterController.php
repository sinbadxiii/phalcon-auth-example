<?php

declare(strict_types=1);

use Phalcon\Mvc\Controller;

class RegisterController extends ControllerBase
{
    protected bool $authAccess = false;

    public function authAccess(): bool
    {
        return $this->authAccess;
    }

    public function registerFormAction()
    {
        $this->view->pick('register/registerForm');
    }

    public function registerAction()
    {
        $user = new Users();
        $user->assign([
            'name' => $this->request->getPost("name"),
            'username' => $this->request->getPost("username"),
            'email' => $this->request->getPost("email"),
            'password' => $this->request->getPost("password"),
        ]);
        $user->save();

        $this->auth->login($user);

        return  $this->response->redirect("/");
    }
}

