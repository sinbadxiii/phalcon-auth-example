<?php

declare(strict_types=1);

namespace App\Security;

use App\Security\Access\Admin;
use App\Security\Access\Auth;
use App\Security\Access\AuthWithBasic;
use App\Security\Access\Guest;
use Sinbadxiii\PhalconAuth\Access\Authenticate as AuthMiddleware;

/**
 * Class Authenticate
 * @package App\Security
 */
class Authenticate extends AuthMiddleware
{
    protected array $accessList = [
        'auth'   => Auth::class,
        'admin'  => Admin::class,
        'guest'  => Guest::class,
        'basic'  => AuthWithBasic::class,
    ];
}
