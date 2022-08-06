<?php

namespace App\Http\Livewire\Search;

use Livewire\Component;
use App\Models\Taxonomy;
use App\Models\Variation;

class Box extends Component
{
    public $taxonomies;
    public $taxonomyId = 0;
    public $searchTerm;

    public $variations = null;

    protected $rules = [
        'taxonomyId' => ['required', 'numeric'],
        'searchTerm' => ['nullable', 'string'],
    ];

    public function mount()
    {
        $this->taxonomies = Taxonomy::orderBy('name')->get();
    }

    public function search()
    {
        if (is_null($this->searchTerm) ||
            empty($this->searchTerm)) {

            $taxonomyId = (int) $this->taxonomyId;

            if ($taxonomyId !== 0) {

                $variations = Taxonomy::where('id', $taxonomyId)
                    ->with('variations')->first()->variations;

                $variations = $variations->reject(function ($variation) {
                    return $variation->stock == 0;
                });

                $varIds = $variations->pluck('id');

                $this->variations = Variation::whereIn('id', $varIds)
                    ->with(['discount', 'media'])->get();

                
            }

        }
    }


    public function render()
    {
        return view('livewire.search.box');
    }
}
