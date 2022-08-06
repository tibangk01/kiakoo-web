<?php

namespace App\View\Components\Search;

use App\Models\Taxonomy;
use Illuminate\View\Component;

class Box extends Component
{
    public $taxonomies;

    public function __construct()
    {
        $this->taxonomies = Taxonomy::orderBy('name')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.search.box');
    }
}
