<?php

declare(strict_types=1);

namespace App\Modules\Front\Controllers;

class BasicController extends ControllerBase
{
    public function onConstruct()
    {
        $this->getDI()->getShared("auth")->access("basic");
    }

    public function indexAction()
    {
    }
}

