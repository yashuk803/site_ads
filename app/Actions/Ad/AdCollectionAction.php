<?php

declare(strict_types=1);

namespace App\Actions\Ad;

use App\Repositories\Contracts\AdRepository;

final class AdCollectionAction
{
    private $adRepository;


    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    public function execute()
    {
       return $this->adRepository->all();
    }
}
