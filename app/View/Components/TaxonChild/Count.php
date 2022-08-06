<?php

namespace App\View\Components\TaxonChild;

use App\Models\TaxonChild;
use Illuminate\View\Component;

class Count extends Component
{
    public $taxonChild;
    public $taxonChildCount;

    public function __construct($taxonChildId)
    {
        $this->taxonChild = TaxonChild::where('id', $taxonChildId)->with(['variations'])->first();
        $this->taxonChildCount = $this->taxonChild->variations->count();
    }

    public function render()
    {
        return view('components.taxon-child.count');
    }
}
