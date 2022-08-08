<?php

$loader = new \Phalcon\Autoload\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */

$loader->setNamespaces(
    [
        'App\Security' => $config->application->securityDir
    ]
);

$loader->setDirectories(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
