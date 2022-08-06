<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function store(Request $request)
    {
        return view('search.show');
      // dd($request);
    }
}
