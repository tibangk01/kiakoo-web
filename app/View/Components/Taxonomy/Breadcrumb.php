<?php

namespace App\View\Components\Taxonomy;

use App\Models\Taxonomy;
use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $taxonomyId;
    public $taxonomyName;

    public function __construct($taxonomyId)
    {
        $this->taxonomyId = $taxonomyId;
        $this->taxonomyName = Taxonomy::where('id', $this->taxonomyId)->first()->name;
    }

    public function render()
    {
        return view('components.taxonomy.breadcrumb');
    }
}
