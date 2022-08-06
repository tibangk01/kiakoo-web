<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;
use App\Models\Taxonomy;

class One extends Component
{
    public $datas;

    public function __construct()
    {
        $this->datas = Taxonomy::where([
            'name' => config('kiakoo.header.one')
        ])
            ->with(['taxons' => function ($q) {
                $q->with(['taxonChildren'])
                    ->orderBy('name')
                    ->get();
            }])
            ->get();
    }

    public function render()
    {
        return view('components.header.one');
    }
}
