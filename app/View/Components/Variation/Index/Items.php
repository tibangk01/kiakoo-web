<?php

namespace App\View\Components\Variation\Index;

use App\Models\Variation;
use Illuminate\View\Component;

class Items extends Component
{
    public $variations;

    public function __construct()
    {
        $this->variations = Variation::where('is_published', true)
            ->with(['media','discount'])
            ->inRandomOrder()
            ->paginate(config('kiakoo.pagination'));
    }

    public function render()
    {
        return view('components.main.items');
    }
}
