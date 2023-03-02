<?php

declare(strict_types=1);

namespace App\Controllers;

class ProfileController extends ControllerBase
{
    public function onConstruct()
    {
        //full auth access
        $this->getDI()->getShared("auth")->access("auth");
    }

    public function indexAction()
    {
    }
}

