<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Entities\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    public function save(User $user): User;

}
