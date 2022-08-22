<?php

declare(strict_types=1);

namespace App\Controllers\Auth;

use App\Controllers\ControllerBase;
use App\Models\User;

class RegisterController extends ControllerBase
{
    public function onConstruct()
    {
        $this->auth("guest");
    }

    public function registerFormAction()
    {
        $this->view->pick('register/registerForm');
    }

    public function registerAction()
    {
        $user = new User();
        $user->assign([
            'name' => $this->request->getPost("name"),
            'username' => $this->request->getPost("username"),
            'email' => $this->request->getPost("email"),
            'password' => $this->request->getPost("password"),
        ]);
        if ($user->save()) {
            $this->auth->login($user);
        }

        return $this->response->redirect("/");
    }
}

