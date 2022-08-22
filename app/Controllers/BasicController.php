<?php

declare(strict_types=1);

namespace App\Controllers;

class BasicController extends ControllerBase
{
    public function onConstruct()
    {
        $this->auth("basic");
    }

    public function indexAction()
    {
    }
}

