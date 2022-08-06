<?php

namespace App\View\Components\Variation;

use Illuminate\View\Component;

class Promotion extends Component
{
    public $datas;

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    public function render()
    {
        return view('components.variation.promotion');
    }
}
