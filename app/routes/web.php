<?php

use Phalcon\Mvc\Router\Group;

$router = $di->getRouter();
$router->setDefaults(['namespace' => 'App\Controllers']);

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);

$router->add("/profile", "profile::index")->setName("profile");
$router->add("/profile/favorites", "profile::favorites")->setName("profile-favorites");

$router->add("/basic", "basic::index")->setName("basic");

$router->add("/customers", "customers::index")->setName("customers");
$router->add("/customers/reports", "customers::reports")->setName("customers-reports");


$auth = new Group(['namespace' => 'App\Controllers\Auth']);
    $auth->setPrefix('');

    $auth->addGet("/login", "login::loginForm")->setName("login-form");
    $auth->addPost("/login", "login::login")->setName("login");
    $auth->addGet("/logout", "login::logout")->setName("logout");

    $auth->addGet("/register", "register::registerForm")->setName("register-form");
    $auth->addPost("/register", "register::register")->setName("register");
$router->mount($auth);
