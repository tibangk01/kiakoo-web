<?php

namespace App\Http\Livewire\Comment\Rating;

use Livewire\Component;
use App\Models\Variation;

class Counts extends Component
{
    protected $listeners = ['commentUpdated' => 'fresh'];

    public $oneCount;
    public $twoCount;
    public $threeCount;
    public $fourCount;
    public $fiveCount;
    public $totalCount;
    public $variationId;

    public function mount($variationId)
    {
        $this->variationId = $variationId;

        $variation = Variation::findOrFail($variationId);

        $ratings = $variation->ratings;

        $this->totalCount = $ratings->count();

        $this->oneCount = $ratings->where('value', 1.0)->count();
        $this->twoCount = $ratings->where('value', 2.0)->count();
        $this->threeCount = $ratings->where('value', 3.0)->count();
        $this->fourCount = $ratings->where('value', 4.0)->count();
        $this->fiveCount = $ratings->where('value', 5.0)->count();
    }

    public function fresh()
    {
        $this->mount($this->variationId);
        $this->render();
    }

    public function render()
    {
        return view('livewire.comment.rating.counts');
    }
}
