<?php

declare(strict_types=1);

namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Auth\RememberTokenInterface;

class RememberToken extends Model implements  RememberTokenInterface
{
    /**
     * @var integer
     */
    public $id;

    /**
     * @var integer
     */
    public $user_id;

    /**
     * @var string
     */
    public $token;

    /**
     * @var string
     */
    public $ip;

    /**
     * @var string
     */
    public $user_agent;

    /**
     * @var integer
     */
    public $created_at;

    /**
     * @var integer
     */
    public $updated_at;

    /**
     * @var integer
     */
    public $expired_at;

    public function initialize()
    {
        $this->setSource("users_remember_tokens");
    }

    public function beforeValidationOnCreate()
    {
        $this->created_at = date(DATE_ATOM);
        $this->updated_at = date(DATE_ATOM);
        if (!$this->expired_at) {
            $this->expired_at = date(DATE_ATOM);
        }
    }

    public function beforeValidationOnSave()
    {
        if (!$this->created_at) {
            $this->created_at = date(DATE_ATOM);
        }
        if (!$this->expired_at) {
            $this->expired_at = date(DATE_ATOM);
        }
        $this->updated_at = date(DATE_ATOM);
    }

    public function beforeValidationOnUpdate()
    {
        $this->updated_at = date(DATE_ATOM);
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function getUserAgent(): string
    {
        return $this->user_agent;
    }
}