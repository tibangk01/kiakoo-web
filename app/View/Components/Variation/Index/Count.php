<?php

namespace App\View\Components\Variation\Index;

use App\Models\Variation;
use Illuminate\View\Component;

class Count extends Component
{
    public $variationCount;

    public function __construct()
    {
        $this->variationCount = Variation::where('is_published', true)->count();
    }

    public function render()
    {
        return view('components.variation.index.count');
    }
}
