<?php

namespace App\Models;

use Phalcon\Di\Di;
use Phalcon\Encryption\Security\Random;
use Phalcon\Mvc\Model;
use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Email as EmailValidator;
use Sinbadxiii\PhalconAuth\RememberingInterface;
use Sinbadxiii\PhalconAuth\AuthenticatableInterface;
use Sinbadxiii\PhalconAuth\RememberTokenInterface;

class User extends Model implements AuthenticatableInterface, RememberingInterface
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
    public $username;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $published;

    /**
     *
     * @var string
     */
    public $created_at;

    /**
     *
     * @var string
     */
    public $updated_at;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSource("users");

        $this->hasOne(
            'id',
            RememberToken::class,
            'user_id',
            [
                'alias' => "remember_token"
            ]
        );
    }

    public function setPassword(string $password)
    {
        $this->password = Di::getDefault()->getShared("security")->hash($password);
        return $this;
    }

    /**
     * @return int
     */
    public function getAuthIdentifier()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * @param string|null $token
     * @return RememberTokenInterface|null|false
     */
    public function getRememberToken(string $token = null): ?RememberTokenInterface
    {
        return $this->getRelated('remember_token', [
            'token=:token:',
            'bind' => ['token' => $token]
        ]);
    }

    /**
     * @param $value
     */
    public function setRememberToken(RememberTokenInterface $value)
    {
        $this->remember_token = $value;
    }

    public function createRememberToken(): RememberTokenInterface
    {
        $random = new Random();

        $token = $random->base64(60);

        $rememberToken = new RememberToken();
        $rememberToken->token = $token;
        $rememberToken->user_agent = Di::getDefault()->get('request')->getUserAgent();
        $rememberToken->ip = Di::getDefault()->get('request')->getClientAddress();

        $this->setRememberToken($rememberToken);
        $this->save();

        return $rememberToken;
    }
}
