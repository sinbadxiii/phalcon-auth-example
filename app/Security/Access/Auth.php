<?php

namespace App\Security\Access;

use Sinbadxiii\PhalconAuth\Access\AuthAccess;

class Auth extends AuthAccess
{
    public function redirectTo()
    {
        if (isset($this->response)) {
            return $this->response->redirect("/login")->send();
        }
    }
}