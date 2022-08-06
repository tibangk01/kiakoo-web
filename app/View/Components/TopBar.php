<?php

namespace App\View\Components;

use App\Models\Taxonomy;
use Illuminate\View\Component;

class TopBar extends Component
{
    public $taxonomies;

    public function __construct()
    {
        $this->taxonomies = Taxonomy::all();
    }

    public function render()
    {
        return view('components.top-bar');
    }
}
