<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Actions\Auth\AuthenticatedUserAction;
use App\Actions\Auth\AuthenticatedUserRequest;
use App\Actions\Auth\RegisterAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AuthenticatedHttpRequest;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    private $authenticatedUserAction;
    private $registerAction;


    public function __construct(
        AuthenticatedUserAction $authenticatedUserAction,
        RegisterAction $registerAction
    ) {
        $this->authenticatedUserAction = $authenticatedUserAction;
        $this->registerAction = $registerAction;
    }

    public function login(AuthenticatedHttpRequest $request)
    {
       if(! $this->authenticatedUserAction->execute(
            AuthenticatedUserRequest::fromRequest($request)
        ) ) {
           $this->registerAction->execute(AuthenticatedUserRequest::fromRequest($request));
       }

        return redirect()->route('home');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home');
    }
}
