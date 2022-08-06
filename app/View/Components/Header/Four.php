<?php

namespace App\View\Components\Header;

use App\Models\Taxonomy;
use Illuminate\View\Component;

class Four extends Component
{
    public $datas;

    public function __construct()
    {
        $this->datas = Taxonomy::where([
            'name' => config('kiakoo.header.four')
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
        return view('components.header.four');
    }
}
