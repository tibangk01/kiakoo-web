<?php

namespace App\View\Components\Footer;

use App\Models\Taxonomy;
use Illuminate\View\Component;

class Taxonomies extends Component
{
    public $taxonomies;

    public function __construct()
    {
        $this->taxonomies = Taxonomy::OrderBy('name')->get();
    }

    public function render()
    {
        return view('components.footer.taxonomies');
    }
}
