<?php

declare(strict_types=1);

use Sinbadxiii\PhalconAuth\Middlewares\Accessicate;

class IndexController extends ControllerBase implements Accessicate
{
    protected bool $authAccess = false;

    public function indexAction()
    {

    }

    public function authAccess(): bool
    {
        return $this->authAccess;
    }
}

