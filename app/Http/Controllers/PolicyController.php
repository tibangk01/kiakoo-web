<?php

namespace App\Http\Controllers;

class PolicyController extends Controller
{
    public function __invoke()
    {
        return view('pages.policy');
    }
}
