<?php

declare(strict_types=1);

namespace App\Modules\Front\Controllers\Auth;

use App\Models\User;
use App\Modules\Front\Controllers\ControllerBase;

class RegisterController extends ControllerBase
{
    public function onConstruct()
    {
        $this->auth->access("guest");
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

