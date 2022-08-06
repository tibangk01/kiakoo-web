<?php

namespace App\Http\Livewire\Variation\Rating;

use Livewire\Component;
use App\Models\Variation;
use Nagy\LaravelRating\Models\Rating;

class Avg extends Component
{
    protected $listeners = ['commentUpdated' => 'fresh'];

    public $avg;
    public $variationId;

    public function mount($variationId)
    {
        $this->variationId = $variationId;

        // fail if variation not exists
        Variation::findOrFail($variationId);

        $variationRatings = Rating::where(function($q) use($variationId){
            $q->where('type', 'rate')
            ->where('rateable_id', $variationId);
        })->get();

        $this->avg = $variationRatings->map(function($rating){

            return $rating->value;
        })->avg();
    }

    public function fresh()
    {
        $this->mount($this->variationId);
        $this->render();
    }

    public function render()
    {
        return view('livewire.variation.rating.avg');
    }


}
