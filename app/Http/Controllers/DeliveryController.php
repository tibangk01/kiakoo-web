<?php

namespace App\Http\Controllers;

class DeliveryController extends Controller
{
    public function __invoke()
    {
        return view('pages.delivery');
    }
}
