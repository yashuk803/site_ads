<?php

declare(strict_types=1);

namespace App\Actions\Ad;

use App\Actions\GetByIdRequest;
use App\Entities\Ad;
use App\Exceptions\AdNotFoundException;
use App\Repositories\Contracts\AdRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

final class CreateAdAction
{
    private $adRepository;


    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute(CreateRequest $request): Ad
    {
        $ad = new Ad();
        $ad->author_id = Auth::id();
        $ad->title = $request->getTitle();
        $ad->description = $request->getDescription();

        $ad = $this->adRepository->save($ad);

        return $ad;
    }
}
