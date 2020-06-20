<?php

namespace App\Http\Controllers\Ad;

use App\Actions\Ad\CreateAdAction;
use App\Actions\Ad\CreateRequest;
use App\Actions\Ad\DeleteAdAction;
use App\Actions\Ad\UpdateAdAction;
use App\Actions\GetByIdRequest;
use App\Actions\Ad\AdViewAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdHttpRequest;


class AdController extends Controller
{
    private $adViewAction;
    private $createAdAction;
    private $deleteAdAction;
    private $updateAdAction;

    public function __construct(
        AdViewAction $adViewAction,
        CreateAdAction $createAdAction,
        DeleteAdAction $deleteAdAction,
        UpdateAdAction $updateAdAction
    )
    {
        $this->adViewAction = $adViewAction;
        $this->createAdAction = $createAdAction;
        $this->deleteAdAction = $deleteAdAction;
        $this->updateAdAction = $updateAdAction;
    }

    public function getById(string $id)
    {
        $ad = $this->adViewAction->execute(new GetByIdRequest((int)$id));
        return view('ad.view', compact('ad'));
    }

    public function create()
    {
        return view('ad.create');
    }

    public function store(CreateAdHttpRequest $request)
    {
        $ad = $this->createAdAction->execute(CreateRequest::fromHttpRequest($request));

        return redirect()->route('show', ['id' => $ad->id]);
    }

    public function delete(string $id)
    {
        $this->deleteAdAction->execute((int)$id);

        return redirect()->route('home');
    }

    public function edit(string $id)
    {
        $ad = $this->adViewAction->execute(new GetByIdRequest((int)$id));
        return view('ad.update', compact('ad'));
    }

    public function update(string $id, CreateAdHttpRequest $request)
    {
        $ad = $this->updateAdAction->execute((int)$id, CreateRequest::fromHttpRequest($request));

        return redirect()->route('show', ['id' => $ad->id]);
    }
}
