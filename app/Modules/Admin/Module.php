<?php

declare(strict_types=1);

namespace App\Modules\Admin;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(\Phalcon\Di\DiInterface $dependencyInjector = null)
    {
    }

    public function registerServices(\Phalcon\Di\DiInterface $di = null)
    {
    }
}