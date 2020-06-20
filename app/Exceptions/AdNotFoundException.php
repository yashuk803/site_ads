<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

final class AdNotFoundException extends ModelNotFoundException
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct('Ad not found.', $code, $previous);
    }
}
