<?php

namespace App\View\Components\TaxonChild;

use App\Models\TaxonChild;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $taxon;
    public $taxonomy;
    public $taxonChild;

    public function __construct($taxonChildId)
    {
        $this->taxonChild = TaxonChild::where('id', $taxonChildId)->first();

        $this->taxon = $this->taxonChild->taxon;
        $this->taxonomy = $this->taxonChild->taxon->taxonomy;
    }

    public function render()
    {
        return view('components.taxon-child.breadcrumb');
    }
}
