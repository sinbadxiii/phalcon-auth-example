<?php

declare(strict_types=1);

namespace App\Modules\Front\Controllers;

class CustomersController extends ControllerBase
{
    public function onConstruct()
    {
        //except actions "reports" from auth access
        $this->getDI()->getShared("auth")->access("auth")->except("reports");
    }

    public function indexAction()
    {
    }

    public function reportsAction()
    {
    }
}

