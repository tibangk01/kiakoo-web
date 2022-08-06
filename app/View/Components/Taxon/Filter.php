<?php

namespace App\View\Components\Taxon;

use Illuminate\View\Component;

class Filter extends Component
{
    public $taxonId;

    public function __construct($taxonId)
    {
        $this->taxonId = $taxonId;
    }

    public function render()
    {
        return view('components.taxon.filter');
    }
}
