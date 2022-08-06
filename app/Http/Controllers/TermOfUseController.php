<?php

namespace App\Http\Controllers;

class TermOfUseController extends Controller
{
    public function __invoke()
    {
        return view('pages.terms-of-use');
    }
}
