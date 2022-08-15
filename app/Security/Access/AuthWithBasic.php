<?php

namespace App\Security\Access;

use Sinbadxiii\PhalconAuth\Access\AccessAbstract;
use Sinbadxiii\PhalconAuth\Exception;

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