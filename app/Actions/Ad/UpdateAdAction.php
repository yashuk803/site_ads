<?php

declare(strict_types=1);

namespace App\Actions\Ad;

use App\Entities\Ad;
use App\Exceptions\AdNotFoundException;
use App\Repositories\Contracts\AdRepository;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

final class UpdateAdAction
{
    private $adRepository;


    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(int $id, CreateRequest $request): Ad
    {
        try {
            $ad = $this->adRepository->getById($id);
        } catch (ModelNotFoundException $ex) {
            throw new AdNotFoundException();
        }

        if ($ad->author_id !== Auth::id()) {
            throw new AuthorizationException();
        }

        $ad->title = $request->getTitle();
        $ad->description = $request->getDescription();

        $ad = $this->adRepository->save($ad);

        return $ad;
    }
}
