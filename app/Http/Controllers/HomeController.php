<?php

namespace App\Http\Controllers;

use App\Actions\Ad\AdCollectionAction;

class HomeController extends Controller
{
    private $adCollectionAction;

    public function __construct(AdCollectionAction $adCollectionAction)
    {
        $this->adCollectionAction = $adCollectionAction;
    }

    public function index()
    {
        $ads = $this->adCollectionAction->execute();

        return view('home',compact('ads'));
    }

}
