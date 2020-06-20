<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

use App\Entities\Ad;
use Illuminate\Pagination\LengthAwarePaginator;


interface AdRepository
{
    public function create(array $fields): Ad;

    public function all(): LengthAwarePaginator;

    public function getById(int $id): Ad;

    public function save(Ad $ad): Ad;

    public function delete(Ad $ad): ?bool;

}
