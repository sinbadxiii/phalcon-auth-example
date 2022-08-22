<?php

declare(strict_types=1);

namespace App\Controllers;

use Phalcon\Mvc\Controller;
use Phalcon\Auth\Access\AccessInterface;

class ControllerBase extends Controller
{
    public function auth(string $accessName): ?AccessInterface
    {
        return $this->auth->access($accessName);
    }
}
