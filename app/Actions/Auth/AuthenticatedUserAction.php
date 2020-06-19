<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


final class AuthenticatedUserAction
{

    public function execute(AuthenticatedUserRequest $request)
    {


        return Auth::guard('user')->attempt([
            'username' => $request->getUsername(),
            'password' => $request->getPassword()
        ]);

    }
}
