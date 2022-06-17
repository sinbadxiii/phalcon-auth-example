<?php
declare(strict_types=1);

use Phalcon\Mvc\Controller;
use Sinbadxiii\PhalconAuth\Middlewares\Accessicate;

class ControllerBase extends Controller implements Accessicate
{
    protected bool $authAccess = true;

    public function authAccess(): bool
    {
        return $this->authAccess;
    }
}
