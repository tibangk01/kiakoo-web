<?php

namespace App\Http\Controllers;

class JobController extends Controller
{
    public function __invoke()
    {
        return view('pages.job');
    }
}
