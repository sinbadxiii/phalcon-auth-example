<?php

declare(strict_types=1);

namespace App\Security;

use App\Security\Access\Auth;
use App\Security\Access\AuthWithBasic;
use App\Security\Access\Guest;
use Phalcon\Auth\Access\Authenticate as AuthMiddleware;

/**
 * Class Authenticate
 * @package App\Security
 */
class Authenticate extends AuthMiddleware
{
    protected $accessList = [
        'auth'   => Auth::class,
        'guest'  => Guest::class,
        'basic'  => AuthWithBasic::class,
    ];
}
