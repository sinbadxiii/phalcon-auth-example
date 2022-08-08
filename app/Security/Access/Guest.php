<?php

namespace App\Security\Access;

use Sinbadxiii\PhalconAuth\Access\GuestAccess;

class Guest extends GuestAccess
{
    public function redirectTo()
    {
        if (isset($this->response)) {
            return $this->response->redirect("/admin")->send();
        }
    }
}