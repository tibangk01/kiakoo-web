<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;
use App\Models\Variation;

class All extends Component
{
    protected $listeners = ['commentUpdated' => '$refresh'];

    public $comments;
    public $ratings;
    public $variationId;

    public function mount($variationId)
    {
        $this->variationId = $variationId;

        $variation = Variation::findOrFail($variationId);

        $this->ratings = $variation->ratings;

        $this->comments = $variation->comments->load(['commentable', 'commentator.customer.human'])->reject(function ($comment) {

            return $comment->is_approved == false;
        })->sortDesc();
    }

    public function render()
    {
        return view('livewire.comment.all');
    }
}
