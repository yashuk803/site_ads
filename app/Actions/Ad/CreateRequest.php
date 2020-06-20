<?php

declare(strict_types=1);

namespace App\Actions\Ad;

use App\Http\Requests\CreateAdHttpRequest;


final class CreateRequest
{
    private $title;
    private $description;

    public function __construct(
        string $title,
        string $description
    ) {
        $this->title = $title;
        $this->description = $description;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public static function fromHttpRequest(CreateAdHttpRequest $request): CreateRequest
    {
        return new static(
            $request->get('title'),
            $request->get('description')
        );
    }
}
