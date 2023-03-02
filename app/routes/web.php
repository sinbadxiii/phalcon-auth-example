<?php

use Phalcon\Mvc\Router\Group;

$router = $di->getRouter(false);
$router->setDefaults(['namespace' => 'App\Modules\Front\Controllers', 'module' => 'front']);

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);

$router->add("/profile", "profile::index")->setName("profile");
$router->add("/basic", "basic::index")->setName("basic");

$router->add("/customers", "customers::index")->setName("customers");
$router->add("/customers/reports", "customers::reports")->setName("customers-reports");


$auth = new Group(['namespace' => 'App\Modules\Front\Controllers\Auth']);
    $auth->setPrefix('');

    $auth->addGet("/login", "login::loginForm")->setName("login-form");
    $auth->addPost("/login", "login::login")->setName("login");
    $auth->addGet("/logout", "login::logout")->setName("logout");

    $auth->addGet("/register", "register::registerForm")->setName("register-form");
    $auth->addPost("/register", "register::register")->setName("register");

$admin = new Group(['namespace' => 'App\Modules\Admin\Controllers', "module" => "admin"]);
$admin->setPrefix('/admin');

$admin->addGet("", "admin::index")->setName("admin-index");
$admin->addGet("/users", "users::index")->setName("admin-users-index");

$router->mount($auth);
$router->mount($admin);
