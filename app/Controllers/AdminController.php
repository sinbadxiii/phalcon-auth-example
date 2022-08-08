<?php

declare(strict_types=1);

namespace App\Controllers;

class AdminController extends ControllerBase
{
    public function onConstruct()
    {
        //full auth access
        $this->auth->access("auth");
    }

    public function indexAction()
    {
    }
}
