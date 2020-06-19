<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Http\Requests\Auth\AuthenticatedHttpRequest;
use App\Http\Requests\Auth\RegisterHttpRequest;

final class RegisterRequest
{
    private $username;
    private $password;

    public function __construct(
        string $username,
        string $password
    ) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public static function fromHttpRequest(AuthenticatedHttpRequest $request): RegisterRequest
    {
        return new static(
            $request->get('username'),
            $request->get('password')
        );
    }
}
