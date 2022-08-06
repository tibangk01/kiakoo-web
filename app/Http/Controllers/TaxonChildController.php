<?php

namespace App\Http\Controllers;

use App\Models\TaxonChild;

class TaxonChildController extends Controller
{
    public function show(TaxonChild $taxonChild)
    {
        return view('taxon-children.show', [
            'taxonChild' => $taxonChild,
        ]);
    }
}
