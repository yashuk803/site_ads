<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Entities\Ad;
use App\Repositories\Contracts\AdRepository;
use Illuminate\Pagination\LengthAwarePaginator;

final class EloquentAdRepository implements AdRepository
{
    public function create(array $fields): Ad
    {
        return Ad::create($fields);
    }

    public function all(): LengthAwarePaginator
    {
        return Ad::latest()->paginate(5);
    }

    public function getById(int $id): Ad
    {
        return Ad::findOrFail($id);
    }

    public function save(Ad $ad): Ad
    {
        $ad->save();

        return $ad;
    }

    public function delete(Ad $ad): ?bool
    {
        return $ad->delete();
    }
}
