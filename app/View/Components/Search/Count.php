<?php

namespace App\View\Components\Search;

use App\Models\Variation;
use Illuminate\View\Component;

class Count extends Component
{
    public $taxonomyId;
    public $searchTerm;
    public $count;

    public function __construct()
    {
        // $this->taxonomyId = $taxonomyId;
        // $this->searchTerm = trim($searchTerm);

     //   $this->count = Variation::with(['taxonomy'])->get();
    }

    public function render()
    {
        return view('components.search.count');
    }
}
