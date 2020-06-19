<?php

declare(strict_types=1);

namespace App\Actions\Auth;

use App\Repositories\Contracts\UserRepository;
use App\Entities\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

final class RegisterAction
{
    private $userRepository;
    private $authenticatedUserAction;

    public function __construct(UserRepository $userRepository, AuthenticatedUserAction $authenticatedUserAction)
    {
        $this->userRepository = $userRepository;
        $this->authenticatedUserAction = $authenticatedUserAction;
    }

    public function execute(AuthenticatedUserRequest $request)
    {
        $validator = Validator::make(
            [
                'username' => $request->getUsername(),
            ],
            [
                'username' => 'required|unique:users|max:255',
            ]
        );

        if($validator->fails()) {
            return redirect()->route('home')->withInput()->withErrors($validator->errors());
        } else {
            $user = new User();
            $user->username = $request->getUsername();
            $user->password = Hash::make($request->getPassword());
            $this->userRepository->save($user);

            $this->authenticatedUserAction->execute($request);
        }
    }
}
