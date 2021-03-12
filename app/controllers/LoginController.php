<?php

declare(strict_types=1);

use Phalcon\Helper\Str;
use Sinbadxiii\PhalconAuth\Middlewares\Accessicate;
use Sinbadxiii\PhalconThrottle\RateLimiter;

class LoginController extends ControllerBase implements Accessicate
{
    protected bool $authAccess = false;

    protected const MAX_AUTH_ATTEMPTS_COUNT = 3;

    public function loginFormAction()
    {

    }

    public function loginAction()
    {
        if ($this->limiter()->tooManyAttempts(
            $this->throttleKey(), $this->maxAttempts()
        )) {
            return $this->blockingLogin();
        }

        if ($this->attemptLogin()) {
            return $this->succesLogin();
        }

        $this->incrementLoginAttempts();

        return $this->failLogin();
    }

    protected function clearLoginAttempts()
    {
        $this->limiter()->clear($this->throttleKey());
    }

    protected function incrementLoginAttempts()
    {
        $this->limiter()->hit(
            $this->throttleKey(), $this->decayMinutes() * 60
        );
    }

    protected function succesLogin()
    {
        $this->flashSession->notice(sprintf('С возвращением, %s', $this->auth->user()->username));
        $this->clearLoginAttempts();
        return $this->response->redirect("/admin");
    }

    private function failLogin()
    {
        $attemptsLeft = $this->limiter()->retriesLeft(
            $this->throttleKey(), $this->maxAttempts()
        );

        $this->flashSession->error(
            "Неверное имя пользователя или пароль. Oсталось {$attemptsLeft} попыток"
        );

        return $this->response->redirect("/login");
    }

    public function logoutAction()
    {
        $this->auth->logout();

        return $this->response->redirect(
            $this->url->get(['for' => 'login'], true)
        );
    }

    protected function limiter()
    {
        return new RateLimiter($this->cache->getAdapter());
    }

    public function maxAttempts()
    {
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : self::MAX_AUTH_ATTEMPTS_COUNT;
    }

    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 1;
    }

    private function attemptLogin()
    {
        $remember = $this->request->getPost('remember') ? true : false;
        return $this->auth->attempt($this->credentials(), $remember);
    }

    private function credentials()
    {
        $username = $this->request->getPost($this->usernameKey(), 'string');
        $password = $this->request->getPost('password', 'string');

        return [$this->usernameKey() => $username, 'password' => $password];
    }

    private function blockingLogin()
    {
        $this->flashSession->error('Вы заблокированы');
        return $this->response->redirect(
            "/login", true
        );
    }

    public function authAccess(): bool
    {
        return $this->authAccess;
    }

    protected function throttleKey(): string
    {
        $rule = 'Any-Latin; Latin-ASCII;';
        $transliterator = Transliterator::create($rule);

        return $transliterator->transliterate(
            Str::lower($this->request->getPost()[$this->usernameKey()]) . ':' .
            $this->request->getClientAddress()
        );
    }

    public function usernameKey()
    {
        return 'email'; //or maybe for example username
    }
}

