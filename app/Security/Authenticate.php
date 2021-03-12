<?php

declare(strict_types=1);

namespace App\Security;

use Sinbadxiii\PhalconAuth\Middlewares\Authenticate as AuthMiddleware;

/**
 * Class Authenticate
 * @package App\Security
 */
class Authenticate extends AuthMiddleware
{
    /**
     * @param $event
     * @param $dispatcher
     */
    public function beforeDispatch($event, $dispatcher)
    {
        $controller = $dispatcher->getControllerClass();

        $this->setGuest(!(new $controller)->authAccess());
    }

    /**
     * @return \Phalcon\Http\ResponseInterface|void
     */
    protected function redirectTo()
    {
        if (isset($this->response)) {
            $this->response->redirect("/login")->send();
        }
    }
}