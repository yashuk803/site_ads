<?php

declare(strict_types=1);

namespace App\Http\Requests\Auth;


use Illuminate\Foundation\Http\FormRequest;

final class AuthenticatedHttpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'username' => 'required',
            'password' => 'required|string|min:8'
        ];
    }

    public function username(): ?string
    {
        return $this->get('username');
    }

    public function password(): ?string
    {
        return $this->get('password');
    }
}
