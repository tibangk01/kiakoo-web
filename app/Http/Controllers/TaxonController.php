<?php

namespace App\Http\Controllers;

use App\Models\Taxon;

class TaxonController extends Controller
{
    public function show(Taxon $taxon)
    {
        return view('taxons.show', [
            'taxon' => $taxon->load([
                'taxonChildren.products.variations'
            ]),
        ]);
    }
}
