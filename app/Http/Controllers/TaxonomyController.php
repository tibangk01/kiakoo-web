<?php

namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Http\Request;

class TaxonomyController extends Controller
{
    public function index()
    {
        return view('taxomonies.index');
    }

    public function show(Taxonomy $taxonomy)
    {
        return view('taxomonies.show', [
            'taxonomy' => $taxonomy->load([
                'taxons.taxonChildren.products.variations'
            ]),
        ]);
    }
}
