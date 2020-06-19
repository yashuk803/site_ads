<?php

declare(strict_types = 1);

namespace App\Actions\Auth;

use App\Http\Requests\Auth\AuthenticatedHttpRequest;

final class AuthenticatedUserRequest
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

    public static function fromRequest(AuthenticatedHttpRequest $request): self
    {
        return new static(
            $request->username(),
            $request->password()
        );
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
