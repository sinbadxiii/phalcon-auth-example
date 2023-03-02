<?php

declare(strict_types=1);

namespace App\Modules\Admin\Controllers;

use Phalcon\Mvc\Controller;

class AdminController extends Controller
{
    public function onConstruct()
    {
        $this->getDI()->getShared("auth")->access("admin");
    }

    public function indexAction()
    {
    }
}
