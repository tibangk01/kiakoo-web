<?php

namespace App\View\Components\Taxon;

use App\Models\Taxon;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $taxonId;
    public $taxonName;
    public $taxonomyId;
    public $taxonomyName;

    public function __construct($taxonId)
    {
        $this->taxonId = $taxonId;
        $this->taxonName = Taxon::where('id', $this->taxonId)->first()->name;
        $this->taxonomyId = Taxon::where('id', $this->taxonId)->with('taxonomy')->first()->taxonomy->id;
        $this->taxonomyName = Taxon::where('id', $this->taxonId)->with('taxonomy')->first()->taxonomy->name;
    }

    public function render()
    {
        return view('components.taxon.breadcrumb');
    }
}
