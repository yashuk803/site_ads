<?php

declare(strict_types=1);

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

final class CreateAdHttpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required'
        ];
    }

    public function title(): string
    {
        return $this->get('title');
    }

    public function description(): string
    {
        return $this->get('description');
    }
}
