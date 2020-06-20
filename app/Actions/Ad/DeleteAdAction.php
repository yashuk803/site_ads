<?php

declare(strict_types=1);
namespace App\Actions\Ad;

use App\Exceptions\AdNotFoundException;
use App\Repositories\Contracts\AdRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class DeleteAdAction
{
    private $adRepository;


    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(int $id): void
    {

        try {
            $ad = $this->adRepository->getById($id);
        } catch (ModelNotFoundException $exception) {

            throw new AdNotFoundException();
        }

        if ($ad->author_id !== Auth::id()) {
            throw new AuthorizationException();
        }

        $this->adRepository->delete($ad);
    }
}
