<?php

namespace App\View\Components\Taxonomy;

use App\Models\Taxonomy;
use Illuminate\View\Component;

class Count extends Component
{
    public $taxonomyId;
    public $taxonomyName;
    public $taxonomyCount;

    public function __construct($taxonomyId)
    {
        $this->taxonomyId = $taxonomyId;
        $this->taxonomyName = Taxonomy::where('id', $this->taxonomyId)->first()->name;
        $this->taxonomyCount = Taxonomy::where('id', $this->taxonomyId)->with(['variations'])->first()->variations->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.taxonomy.count');
    }
}
