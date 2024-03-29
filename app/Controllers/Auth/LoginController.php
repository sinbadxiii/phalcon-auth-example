<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Controllers\ControllerBase;

class LoginController extends ControllerBase
{
    public function onConstruct()
    {
        //except actions "logout" from guest access
        $this->getDI()->getShared("auth")->access("guest")->except("logout");
    }

    public function loginFormAction()
    {
    }

    public function loginAction()
    {
        if ($this->attemptLogin()) {
            return $this->succesLogin();
        }

        return $this->failLogin();
    }

    protected function succesLogin()
    {
        return $this->response->redirect("/profile");
    }

    private function failLogin()
    {
        $this->flashSession->error(
            "Email or password is incorrect, please try again"
        );

        return $this->response->redirect("/login");
    }

    public function logoutAction()
    {
        $this->auth->logout();

        return $this->response->redirect(
            "/login", true
        );
    }

    private function attemptLogin()
    {
        $remember = $this->request->getPost('remember') ? true : false;

        return $this->auth->attempt($this->credentials(), $remember);
    }

    private function credentials()
    {
        $username = $this->request->getPost($this->loginKey(), 'string');
        $password = $this->request->getPost('password', 'string');

        return [$this->loginKey() => $username, 'password' => $password];
    }

    public function loginKey()
    {
        return 'email'; //or maybe for example username
    }
}

