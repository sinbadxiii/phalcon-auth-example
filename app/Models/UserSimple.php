<?php

namespace App\Models;

use Phalcon\Auth\AuthenticatableInterface;

class UserSimple implements AuthenticatableInterface
{
    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public string $username;

    /**
     *
     * @var string
     */
    public string $name;

    /**
     *
     * @var string
     */
    public string $email;

    /**
     *
     * @var string
     */
    public string $password;

    /**
     *
     * @var integer
     */
    public $published;

    /**
     * @param $data
     */
    public function __construct($data)
    {
        foreach ($data as $field => $value) {
            $this->$field = $value;
        }
    }

    /**
     * @return int
     */
    public function getAuthIdentifier(): mixed
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthPassword(): string
    {
        return $this->password;
    }
}
