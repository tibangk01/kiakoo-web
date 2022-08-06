<?php

namespace App\Http\Controllers;

use App\Models\Taxonomy;
use Illuminate\Http\Request;

class TaxonomySearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $taxonomyId = 0;

        if ((int) $request->taxonomy_id !== 0) {
            $taxonomyId = Taxonomy::findOrFail($request->taxonomy_id)->id;
        }

        $searchTerm = $request->searchTerm;

        return view('taxomonies.search', [
            'taxonomyId' => $taxonomyId,
            'searchTerm' => $searchTerm,
        ]);
    }
}
