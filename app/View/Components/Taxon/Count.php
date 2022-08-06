<?php

namespace App\View\Components\Taxon;

use App\Models\Taxon;
use Illuminate\View\Component;

class Count extends Component
{
    public $taxonId;
    public $taxonName;
    public $taxonCount;

    public function __construct($taxonId)
    {
        $this->taxonId = $taxonId;
        $this->taxonName = Taxon::where('id', $this->taxonId)->first()->name;
        $this->taxonCount = Taxon::where('id', $this->taxonId)->with(['variations'])->first()->variations->count();
    }

    public function render()
    {
        return view('components.taxon.count');
    }
}
