<?php

namespace App\Http\Controllers;

use App\Actions\GetByIdRequest;
use App\Actions\Ad\AdViewAction;
use Illuminate\Http\Request;

class AdController extends Controller
{
    private $adViewAction;
    public function __construct(AdViewAction  $adViewAction)
    {
        $this->adViewAction = $adViewAction;
    }

    public function getById(string $id)
    {
        $ad = $this->adViewAction->execute(new GetByIdRequest((int)$id));
        return view('ad.view',compact('ad'));
    }
}
