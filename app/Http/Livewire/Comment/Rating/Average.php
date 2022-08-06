<?php

namespace App\Http\Livewire\Comment\Rating;

use Livewire\Component;
use App\Models\Variation;

class Average extends Component
{
    protected $listeners = ['commentUpdated' => 'fresh'];

    public $avg;
    public $variationId;

    public function mount($variationId)
    {
        $this->variationId = $variationId;

        $variation = Variation::findOrFail($variationId);

        $this->avg = $variation->ratingsAvg();
    }

    public function fresh()
    {
        $this->mount($this->variationId);
        $this->render();
    }

    public function render()
    {
        return view('livewire.comment.rating.average');
    }
}
