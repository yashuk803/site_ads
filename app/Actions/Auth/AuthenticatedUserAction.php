<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use Illuminate\Support\Facades\Auth;

final class AuthenticatedUserAction
{

    public function execute(AuthenticatedUserRequest $request)
    {

        return Auth::attempt([
            'username' => $request->getUsername(),
            'password' => $request->getPassword()
        ]);

    }
}
