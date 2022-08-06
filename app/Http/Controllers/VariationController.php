<?php

namespace App\Http\Controllers;

use App\Models\Variation;
use App\Services\VariationService;

class VariationController extends Controller
{
    public $service;

    public function __construct()
    {
        $this->service = new VariationService;
    }

    public function index()
    {
        return view('variations.index');
    }

    public function show(Variation $variation)
    {
        /** [ o => old variation, p => sent property_id, pv => sent property_value_id ] **/

        if (
            request()->query('o') != null &&
            request()->query('p') != null &&
            request()->query('pv') != null
        ) {

            $variation = $this->service->searchSimilar(
                request()->query('o'),
                request()->query('p'),
                request()->query('pv')
            ) ?? $variation;
        }

        return view('variations.show', [
            'variation' => $variation
                ->load(['media', 'discount']),
        ]);
    }
}
