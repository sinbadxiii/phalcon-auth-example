<?php

namespace App\Security\Access;

use Phalcon\Auth\Access\AccessAbstract;
use Phalcon\Auth\Exception;

class AuthWithBasic extends AccessAbstract
{
    /**
     * @return bool
     */
    public function allowedIf(): bool
    {
        if ($this->auth->basic("email")) {
            return true;
        }

        return false;
    }

    /**
     * @return void
     * @throws Exception
     */
    public function redirectTo()
    {
        throw new Exception("Basic: Invalid credentials.");
    }
}