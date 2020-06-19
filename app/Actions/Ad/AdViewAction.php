<?php

declare(strict_types=1);

namespace App\Actions\Ad;

use App\Actions\GetByIdRequest;
use App\Exceptions\AdNotFoundException;
use App\Repositories\Contracts\AdRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class AdViewAction
{
    private $adRepository;


    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(GetByIdRequest $request)
    {
        try {
            $ad = $this->adRepository->getById($request->getId());
        } catch (ModelNotFoundException $ex) {
            throw new AdNotFoundException();
        }
        return $ad;
    }
}
