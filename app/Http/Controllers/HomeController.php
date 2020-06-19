<?php

namespace App\Http\Controllers;

use App\Entities\Ad;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $ads = Ad::latest()->paginate(5);

        return view('home',compact('ads'));
    }

}
