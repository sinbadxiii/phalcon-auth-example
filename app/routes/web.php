<?php

$router = $di->getRouter();

// Define your routes here

$router->handle($_SERVER['REQUEST_URI']);

$router->add("/admin", "Admin::index")->setName("admin");

$router->addGet("/login", "Login::loginForm")->setName("login-form");
$router->addPost("/login", "Login::login")->setName("login");
$router->addGet("/logout", "Login::logout")->setName("logout");

$router->addGet("/register", "Register::registerForm")->setName("register-form");
$router->addPost("/register", "Register::register")->setName("register");

