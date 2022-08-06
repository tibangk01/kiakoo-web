<?php

namespace App\View\Components\Variation;

use App\Models\Variation;
use Illuminate\View\Component;

class Spec extends Component
{
    public $datas;
    public $variationId;

    public function __construct($variationId)
    {
        $this->variationId = $variationId;

        $this->datas = Variation::where('id', $variationId)
            ->with(['propertyValues.property'])
            ->first()->propertyValues;
    }

    public function render()
    {
        return view('components.variation.spec');
    }
}
