<?php

declare(strict_types=1);

namespace App\Controllers;

class ProfileController extends ControllerBase
{
    public function onConstruct()
    {
        //full auth access
        $this->auth->access("auth");
    }

    public function indexAction()
    {
    }

    public function favoritesAction()
    {
    }
}

