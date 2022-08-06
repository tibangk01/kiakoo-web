<?php

namespace App\View\Components\Product\Promotion;

use Illuminate\View\Component;

class Progress extends Component
{
    public $datas;

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.product.promotion.progress');
    }
}
