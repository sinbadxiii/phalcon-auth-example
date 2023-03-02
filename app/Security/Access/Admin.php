<?php

namespace App\Security\Access;

use Exception;
use Sinbadxiii\PhalconAuth\Access\Auth as AuthAccess;;

class Admin extends AuthAccess
{
    public function allowedIf(): bool
    {
        $auth = $this->getDI()->getShared("auth");

        if ($auth->check() && $auth->user()->isAdmin()) {
            return true;
        }

        return false;
    }

    public function redirectTo()
    {
        if (isset($this->response)) {
            return $this->response->redirect("/login")->send();
        }
        //or maybe throw exception ex.
        //throw new Exception("403 Error!");
    }
}